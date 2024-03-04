<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockRotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'product_ean',
        'stage',
        'qty',
        'location',
    ];


}
