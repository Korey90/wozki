<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function productDescription(){
        return $this->hasOne(\App\Models\Admin\ProductDescription::class, 'product_id');
    }

    public function productDetail(){
        return $this->hasOne(\App\Models\Admin\ProductDetail::class, 'product_id');
    }

    public function productSupplier(){
        return $this->hasOne(\App\Models\Admin\Supplier::class, 'id', 'supplier_id');
    }

    public function productPhotos(){
        return $this->hasOne(\App\Models\Admin\ProductPhoto::class, 'product_id');
    }
    public function productStock(){
        return $this->hasOne(\App\Models\Admin\Stock::class);
    }

    public function categories()
    {
        return $this->belongsToMany(\App\Models\Admin\Category::class);
    }

}
