<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'fname',
        'mname',
        'lname',
        'language',
        'address_id',
        'contact_id',
        'company_id',
    ];


    public function supplierAddress(){
        return $this->hasOne(SupplierAddress::class, 'id', 'address_id');
    }

    public function supplierContact(){
        return $this->hasOne(SupplierContact::class, 'id', 'contact_id');
    }
    
    public function supplierCompany(){
        return $this->hasOne(SupplierCompany::class, 'id', 'company_id');
    }
}
