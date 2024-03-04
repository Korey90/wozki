<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',           
        'front_title',          
        'front_title_en',       
        'short_description',    
        'short_description_en', 
        'long_description',     
        'long_description_en',  
        'basket_description',   
        'meta_tags',            
        'meta_description',     
    ];

}
