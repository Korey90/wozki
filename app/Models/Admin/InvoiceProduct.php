<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'product_name',
        'qty',
        'price_netto',
        'product_vat',
        'price_brutto',
        'total_price_netto',
        'total_vat',
        'total_price_brutto',
    ];

    
}
