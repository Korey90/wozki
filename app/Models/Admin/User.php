<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
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





    public function address(){
        return $this->hasMany(UserAddress::class, 'user_id' ,'id');
    }

    public function userDetails(){
        return $this->hasOne(UserDetails::class, 'user_id', 'id');
    }
    public function company(){
        return $this->hasOne(UserCompany::class, 'user_id', 'id');
    }
    public function orders(){
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
    public function carts(){
        return $this->hasMany(Cart::class, 'user_id', 'id')
                    ->select('name', 'session_id',  DB::raw('SUM(price * qty) as cart_total'), DB::raw('SUM(qty) as product_total'))
                    ->groupBy('session_id', 'name');
    }
}
