<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stline',
        'ndline',
        'town',
        'post_code',
        'country',
        'phone',
        'email',
        'recivier',
    ];
}
