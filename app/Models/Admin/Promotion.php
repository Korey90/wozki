<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    // propotions

    protected $fillable = [
        'title',
        'typ',
        'value',
        'products',
        'status',
        'requirment',
        'valid_from',
        'valid_to',
        'code',
    ];
}
