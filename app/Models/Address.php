<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'name', 'mobile', 'area_code', 'phone', 'state', 'city', 'state_name', 'city_name', 'address', 'postal_code', 'show',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // استفاده: این متود وقتی استفاده میشه که میخوایم با حذف یه آدرسی به جای id اون آدرس چیز دیگری داخل فیلد address_id جدول orders ثبت کنیم که البته حتما باید داخل فایل مایگریشن، ('onDelete') برای اون فیلد قرار بگیره
    /*protected static function boot()
    {
        parent::boot();

        static::deleting(function ($address) {
            $address->orders->each(function ($order) use ($address) {
                $order->address_id = $address->state_name;
                $order->save();
            });
        });
    }*/
}
