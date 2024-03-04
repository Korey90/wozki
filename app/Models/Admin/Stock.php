<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'current_qty',
        'minimum_stock',
        'maximum_stock',
    ];

    public function productInformation(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function inventory(){
        
    }


}
