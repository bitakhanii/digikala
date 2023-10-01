<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Cart\Facade\Cart;

class OrderController extends Controller
{

    public function setAddressSession(Request $request): void
    {
        session()->put('order.addressID', $request->addressID);
        session()->put('order.factor', $request->factor);
    }

    public function cartReview(): View
    {
        $amount = Cart::all()->sum(function ($item) {
            return $item['product']['price'] * $item['number'];
        });
        $discounts = Cart::all()->sum(function ($item) {
            return floorPrice(($item['product']['price'] * $item['product']['discount'] / 100) * $item['number']);
        });

        $totalAmount = Cart::totalAmount() + getSetting('post_price');

        $addressID = session('order.addressID');
        $address = \App\Models\Address::query()->whereId($addressID)->first();

        return view('buystep3.index', compact(['amount', 'discounts', 'totalAmount', 'address']));
    }

    public function digikalaCall(Request $request): void
    {
        session()->put('order.call', $request->call);
    }

    function setAmountSession(Request $request)
    {
        session()->flash('order.amount', Cart::totalAmount() + getSetting('post_price') - session('discount-amount'));
        session()->flash('order.cart-amount', Cart::totalAmount());
        session()->flash('order.post-price', getSetting('post_price'));
        if (session()->has('discount-id')) {
            session()->flash('order.discount-id', session()->get('discount-id'));
        }
        if ($request->payGateway != null) {
            session()->flash('order.pay-gateway', $request->payGateway);
        }
    }

    public function paymentInfo()
    {
        return view('buystep4.index');
    }

    function codeStatus(Request $request)
    {
        return checkCode($request);
    }
}
