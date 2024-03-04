<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Btb extends Model
{

    use HasFactory,Sortable;

    protected $fillable = [
        'kod',
        'nazwa',
        'cena',
        'VAT',
        'stan',
        'EAN',
        'grupa',
        'opis',
        'zdjecia',
        ];

    public $sortable = [
        'kod',
        'nazwa',
        'cena',
        'VAT',
        'stan',
        'EAN',
        'grupa',
        'opis',
        'zdjecia',
    ];

}
