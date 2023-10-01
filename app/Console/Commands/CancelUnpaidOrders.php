<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Console\Command;

class CancelUnpaidOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:cancel-unpaid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel unpaid orders that are older than 1 hour';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders = Order::query()->where('status', '=', 'unpaid')->where('pay_gateway', '!=', 'cash')->where('updated_at', '<=', now()->subHour())->get();

        foreach ($orders as $order) {
            $order->status = 'canceled';
            $order->save();

            $discount = $order->discount;
            if ($discount) {
                $discount->used -= 1;
                $discount->save();
                $order->discount_id = null;
                $order->save();
            }

            $products = $order->products;
            foreach ($products as $product) {
                $number = $product->pivot->number;
                $inventory = $product->inventory += $number;
                $sold = $product->sold -= $number;

                $product = Product::query()->findOrFail($product->id);
                $product->update([
                    'inventory' => $inventory,
                    'sold' => $sold,
                ]);
            }

        }

        $this->info(count($orders) . ' unpaid orders canceled.');
    }
}
