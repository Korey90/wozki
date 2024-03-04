<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'numer_zamowienia',
        'product_id',
        'product_name',
        'product_price',
        'qty',
        'item_note'
    ];


    public function produkty(){
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
