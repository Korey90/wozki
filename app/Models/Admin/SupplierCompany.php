<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'vat_id',
        'eori_id',
        'logo',
        'description',
    ];
}
