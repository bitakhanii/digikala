<?php

namespace Modules\Cart\Facade;


use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;

class CartService
{
    protected $cart;

    public function __construct()
    {
        $this->cart = collect(json_decode(request()->cookie('cart', $this->cart), true)) ?? collect([]);
        //$this->cart = session()->get('cart') ?? collect([]);
    }

    /**
     * @param array $values
     * @return $this
     */
    public function put(array $values): static
    {
        $this->cart = collect($this->cart)->put($values['id'], $values);
        Cookie::queue('cart', $this->cart->toJson(), 7 * 24 * 60);

        //session()->put('cart', $this->cart);

        return $this;
    }

    /**
     * @param int $productID
     * @param int $colorID
     * @param mixed $number
     * @return $this
     */
    public function update(int $productID, int $colorID, mixed $number): static
    {
        $product = collect($this->get($productID, $colorID));

        if (is_numeric($number)) {
            $product = $product->merge(['number' => $product['number'] + 1]);
        }
        if (is_array($number)) {
            $product = $product->merge($number);
        }

        $this->put($product->toArray());

        return $this;
    }

    /**
     * @param int $productID
     * @param int $colorID
     * @return bool
     */
    public function has(int $productID, int $colorID): bool
    {
        return !is_null(collect($this->cart)->where('product_id', $productID)->where('color_id', $colorID)->first());
    }

    /**
     * @param $id
     * @return array
     */
    public function get(int $productID, int $colorID): array
    {
        $item = collect($this->cart)->where('product_id', $productID)->where('color_id', $colorID)->first();
        $item['product'] = $this->productInfo($item['product_id']);
        $item['color'] = $this->colorInfo($item['color_id']);

        return $item;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        $this->cart = collect($this->cart)->map(function ($item) {
            $item['product'] = $this->productInfo($item['product_id']);
            $item['color'] = $this->colorInfo($item['color_id']);
            return $item;
        });
        return $this->cart;
    }

    /**
     * @return int
     */
    public function totalAmount(): int
    {
        return $this->all()->sum(function ($item) {
            return $item['product']['final_price'] * $item['number'];
        });
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->cart->sum(function ($item) {
            return $item['number'];
        });
    }

    /**
     * @param $id
     * @return $this
     */
    public function delete($id): static
    {
        $this->cart = collect($this->cart)->filter(function ($item) use ($id) {
            return $item['id'] != $id;
        });

        Cookie::queue('cart', $this->cart->toJson(), 7 * 24 * 60);
        //session()->put('cart', $this->cart);

        return $this;
    }

    /**
     * @return $this
     */
    public function flush()
    {
        $this->cart = '';
        Cookie::queue('cart', $this->cart);

        return $this;
    }

    /**
     * @param int $id
     * @return array
     */
    protected function productInfo(int $id): array
    {
        $product = Product::query()->firstWhere('id', $id);
        return ['price' => $product->price, 'discount' => $product->discount, 'final_price' => $product->final_price, 'discount_amount' => $product->discount_amount, 'title' => $product->title, 'en_title' => $product->en_title, 'image' => $product->image, 'inventory' => $product->inventory];
    }

    /**
     * @param int $id
     * @return array
     */
    protected function colorInfo(int $id): array
    {
        if ($id != 0) {
            $color = Color::query()->firstWhere('id', $id);
            return ['name' => $color->name, 'hex' => $color->hex];
        } else {
            return [];
        }
    }
}


