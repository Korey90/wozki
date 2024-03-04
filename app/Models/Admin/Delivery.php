<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'delivery_method',
        'delivery_amount',
        'delivery_currency',
        'delivery_address_company_name',
        'delivery_address_name',
        'delivery_address_phone',
        'delivery_address_street',
        'delivery_address_zip_code',
        'delivery_address_city',
        'delivery_address_country',
        'delivery_pickup_point_id',
        'delivery_pickup_point_name',
        'delivery_pickup_point_street',
        'delivery_pickup_point_zip_code',
        'delivery_pickup_point_city',
        'created_at',
        'updated_at',
    ];

  
}



















