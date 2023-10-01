<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Modules\Cart\Facade\Cart;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use App\Models\Payment;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;

class PaymentController extends Controller
{
    public function index()
    {
        try {
            $call = session()->has('order.call') ? session('order.call') : 0;

            $order = Order::query()->create([
                'user_id' => auth()->user()->id,
                'address_id' => session('order.addressID'),
                'amount' => session('order.cart-amount'),
                'post_amount' => session('order.post-price'),
                'discount_id' => session('order.discount-id'),
                'payable' => session('order.amount'),
                'pay_gateway' => session('order.pay-gateway'),
                'factor' => session('order.factor'),
                'call' => $call,
            ]);

            $cart = Cart::all();

            $orderItems = $cart->mapWithKeys(function ($item) {
                return [
                    $item['product_id'] => ['number' => $item['number'], 'price' => $item['product']['price'], 'discount' => $item['product']['discount']],
                ];
            });

            $order->products()->attach($orderItems);


            if ($order->pay_gateway == 'saman') {
                return $this->samanPayment($order);

            } else if ($order->pay_gateway == 'zarrinpal') {
                return $this->zarrinpalPayment();

            } else if ($order->pay_gateway == 'cash') {
                return $this->cashPayment($order);
            }

        } catch (\Exception $e) {
            alert()->error('خطا!', $e->getMessage());
            return back();
        }
    }

    public function profilePayment($orderID)
    {
        $order = Order::query()->findOrFail($orderID);
        try {
            if ($order->pay_gateway == 'saman') {
                return $this->samanPayment($order, true);

            } else if ($order->pay_gateway == 'zarrinpal') {
                return $this->zarrinpalPayment();
            }

        } catch (\Exception $e) {
            alert()->error('خطا!', $e->getMessage());
            return back();
        }
    }

    public function callback(Request $request)
    {
        $payment = Payment::query()->where('transaction_id', $request->transactionId)->firstOrFail();
        $order = $payment->order;

        try {
            ShetabitPayment::via('local')->amount($order->payable)->transactionId($request->transactionId)->verify();

            $payment->update([
                'status' => 1,
            ]);

            $payment->order->update([
                'status' => 'paid',
            ]);

            alert()->success('', 'با تشکر از پرداخت شما!');


        } catch (InvalidPaymentException $exception) {

            if (!$request['profile']) {

                $this->changeProductInventory($order->products);

                $discount = $order->discount;
                if ($discount) {
                    $this->changeDiscountUsed($discount);
                }

                $this->flushCart();
            }

            alert()->error('خطا!', 'عملیات پرداخت ناموفق بود!');
        }

        if (!$request['profile']) {

            $this->changeProductInventory($order->products);

            $discount = $order->discount;
            if ($discount) {
                $this->changeDiscountUsed($discount);
            }

            $this->flushCart();
        }

        return redirect(route('index'));
    }

    protected function samanPayment($order, $profile = false)
    {
        $invoice = new Invoice;
        $invoice->amount($order->payable);

        return ShetabitPayment::via('local')->callbackUrl('/payment/callback?profile='.$profile)->purchase($invoice, function ($driver, $transactionId) use ($order) {

            $order->payments()->create([
                'transaction_id' => $transactionId,
                'status' => 0,
            ]);

        })->pay()->render();
    }

    protected function zarrinpalPayment()
    {
        return 'درگاه پرداخت زرین پال به زودی فعال میشود.';
    }

    protected function cashPayment($order)
    {
        $order->update([
            'status' => 'processing',
        ]);

        $discount = $order->discount;
        if ($discount) {
            $this->changeDiscountUsed($discount);
        }

        $this->changeProductInventory($order->products);

        $this->flushCart();

        alert()->success('حله!', 'سفارش شما با موفقیت ثبت شد.');
        return redirect(route('index'));
    }

    protected function changeProductInventory($products)
    {
        foreach ($products as $product) {
            $productID = $product->id;
            $number = $product->pivot->number;

            $product = Product::query()->findOrFail($productID);
            $product->inventory -= $number;
            $product->sold += $number;
            $product->save();
        }
    }

    protected function changeDiscountUsed($discount)
    {
        $discount->used += 1;
        $discount->save();
    }

    protected function flushCart()
    {
        Cart::flush();
        session()->forget('order');
    }
}
