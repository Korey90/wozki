<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory,Sortable;

    protected $fillable = [
        'supplier_id',
        'description_id',
        'detail_id',
        'title',
        'title_eng',
        'status',
        'ean_number',
        'price',
        'sale_price',
        'delivery_cost',
        'code',
        'vat',
    ];

    public $sortable = ['id', 'TITLE', 'STATUS', 'EAN_NUMBER', 'supplier'];


    public function productDescription(){
        return $this->hasOne(ProductDescription::class, 'product_id');
    }

    public function productDetail(){
        return $this->hasOne(ProductDetail::class, 'product_id');
    }

    public function productSupplier(){
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }

    public function productPhotos(){
        return $this->hasOne(ProductPhoto::class, 'product_id');
    }
    public function productStock(){
        return $this->hasOne(Stock::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
//        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');

    }

}
