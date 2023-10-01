<?php

namespace Modules\Discount\Entities;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'percent', 'initial_credit', 'used', 'expired_at',
    ];

    protected static function newFactory()
    {
        return \Modules\Discount\Database\factories\DiscountFactory::new();
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('register');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
