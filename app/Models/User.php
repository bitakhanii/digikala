<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Discount\Entities\Discount;

class User extends Authenticatable implements MustVerifyEmail
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'dob',
        'sex',
        'area_code',
        'phone',
        'address',
        'national_code',
        'credit_card',
        'newsletter',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function getFirstNameAttribute()
    {
        $name = explode('-', $this->name);
        return $name[0];
    }

    public function getLastNameAttribute()
    {
        $name = explode('-', $this->name);
        if (isset($name[1])) {
            return $name[1];
        } else {
            return '';
        }
    }

    public function commentReaction()
    {
      return $this->belongsToMany(Comment::class, 'comment_user_table');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains('name', $permission->name);
    }
}
