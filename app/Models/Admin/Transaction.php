<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Wyłączanie domyślnych kolumn 'created_at' i 'updated_at'
    public $timestamps = false;

    protected $fillable = [
        'typ',
        'value',
        'balance',
        'operator',
        'date',
        'title',
    ];
}
