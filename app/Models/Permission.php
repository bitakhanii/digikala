<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'label', 'role_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
