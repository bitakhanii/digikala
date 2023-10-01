<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Discount\Entities\Discount;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'address_id', 'amount', 'post_amount', 'discount_id', 'payable', 'status', 'pay_gateway','factor', 'call', 'tracking_serial',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('number', 'price', 'discount');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
