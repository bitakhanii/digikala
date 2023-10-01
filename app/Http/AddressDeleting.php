<?php

namespace App\Http;

use App\Models\Address;
use App\Models\Order;

class AddressDeleting
{
    public $address;
    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function handle()
    {
        // در اینجا، فیلد state را به فیلد address_id در جدول orders تغییر دهید
        Order::where('address_id', $this->address->id)->update(['address_id' => $this->address->state]);
    }
}
