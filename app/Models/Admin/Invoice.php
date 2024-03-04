<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'delivery_reference',
        'date_of_issue',
        'sale_date',
        'payment_method',
        'total_netto',
        'total_brutto',
        'status',
    ];


    public function invoiceProducts(){
        return $this->hasMany(InvoiceProduct::class, 'invoice_number', 'invoice_number');
    }

    public function invoiceDelivery(){
        return $this->hasOne(InvoiceDelivery::class, 'reference_number','delivery_reference');
    }

}
