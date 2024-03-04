<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'email',
        'fax',
        'facebook',
        'telegram',
        'whatsapp',
        'website',
    ];
}
