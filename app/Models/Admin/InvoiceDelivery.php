<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDelivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'costumer_name',
        'costumer_nip',
        'address_street',
        'building_number',
        'door_number',
        'post_code',
    ];

}
