<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'numer_zamowienia',
        'type',
        'order_date',
        'total_to_pay_amount',
        'total_to_pay_currency',
        'total_paid_amount',
        'total_paid_currency',
        'seller_notes',
        'buyer_notes',
        'status',
        'user_id',
        'payment_id',
        'invoice_id',

    ];

    public function OrderProduct(){
        return $this->hasMany(OrderProduct::class, 'numer_zamowienia', 'numer_zamowienia');
    }

    public function buyer(){
        return $this->hasOne(User::class, 'id', 'user_id')->with('userDetails','address');
    }

    public function delivery_address(){
        return $this->hasOne(Delivery::class, 'order_id', 'order_id');
    }


    public function products(){
        return $this->hasMany(Product::class, 'ean_number', 'product_ean');
    }
}
