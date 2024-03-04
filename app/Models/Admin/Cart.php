<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'session_id', 'product_id', 'qty', 'price', 'note'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
