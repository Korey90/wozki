<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Supplier;
use App\Models\Admin\SupplierAddress;
use App\Models\Admin\SupplierContact;
use App\Models\Admin\SupplierCompany;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index (){

        $suppliers = Supplier::with('supplierAddress','supplierContact','supplierCompany')->get();
        return view('admin.supplier.index', ['suppliers' => $suppliers]);
    }

    public function show($id){

        $supplier = Supplier::where('id', $id)->with('supplierAddress','supplierContact','supplierCompany')->get();
        return view('admin.supplier.show', ['supplier' => $supplier]);
    }


    public function create(){
        return view('admin.supplier.create');
    }

    public function edit($id){

        $supplier = Supplier::where('id', $id)->with('supplierAddress','supplierContact','supplierCompany')->get();

        return view('admin.supplier.edit', ['supplier' => $supplier]);

    }

    public function store(Request $request){

                ////////////////// Validiacja ///////////////////////
       $request->validate([

        'title'         => 'required|max:120',
        'fname'         => 'required|max:120',
        'mname'         => 'nullable',
        'lname'         => 'required|max:120',
        'language'      => 'nullable',
        'stline'        => 'required|max:120',
        'ndline'        => 'required|max:120',
        'town'          => 'required|max:50',
        'post_code'     => 'required',
        'name'          => 'required|max:120',//conpany name
        'vat_id'        => 'nullable',
        'eori_id'       => 'nullable',
        'description'   => 'nullable',
        'email'         => 'required',
        'phone'         => 'required',
        'fax'           => 'nullable',
        'website'       => 'max:120',
        'facebook'      => 'max:120',
        'telegram'      => 'max:120',
        'whatsapp'      => 'max:120',
        'logo' =>  'required|image|mimes:jpeg,jpg,png,gif',/////

    ]);



    
    ////////////////// Upload Obrazka ///////////////////////
    $image = $request->logo;
        $dir = 'products/'.str_replace(" ", "-", $request->title).'/';
        $newFileName = 'product-'.rand().'.'.$image->extension();
        $image->storeAs($dir, $newFileName, 'public');  


    $supplierCompany = SupplierCompany::create([
        'name'              =>      $request->name,
        'vat_id'            =>      $request->vat_id,
        'eori_id'           =>      $request->eori_id,
        'description'       =>      $request->description,
        'logo'              =>      $dir.$newFileName,
    ]);

    $supplierContact = SupplierContact::create([
        'email'         =>      $request->email,
        'phone'         =>      $request->phone,
        'fax'           =>      $request->fax,
        'website'       =>      $request->website,
        'facebook'      =>      $request->facebook,
        'telegram'      =>      $request->telegram,
        'whatsapp'      =>      $request->whatsapp,
    ]);

    // Create a new record for Supplier Address Table
    $supplierAddress = SupplierAddress::create([
        'stline'            =>  $request->stline,
        'ndline'            =>  $request->ndline,
        'town'              =>  $request->town,
        'post_code'         =>  $request->post_code,
    ]);
    // Create a new record for Supplier Table
    Supplier::create([
        'title'         =>      $request->title,
        'fname'         =>      $request->fname,
        'mname'         =>      $request->mname,
        'lname'         =>      $request->lname,
        'language'      =>      $request->language,
        'contact_id'    =>      $supplierContact->id,
        'company_id'    =>      $supplierCompany->id,
        'address_id'    =>      $supplierAddress->id,

    ]);


            
    
           return back()->with('status', 'ok  has ben Created successfully.');



        return $request;

    }


    public function update(Request $request) {

        $value = $request->input('value');
        $field = $request->input('field');
        $id = $request->input('id');
    
        $supplierFields = ['id', 'title', 'fname', 'mname', 'lname', 'language', 'address_id', 'contact_id', 'company_id'];
        $supplierAddressFields = ['stline', 'ndline', 'town', 'post_code'];
        $supplierCompanyFields = ['name', 'vat_id', 'eori_id', 'logo', 'description'];
        $supplierContactFields = ['phone', 'email', 'fax', 'facebook', 'telegram', 'whatsapp', 'website'];
    
        $supplier = Supplier::where('id', '=', $id)->get();
    
        if(in_array($field, $supplierFields)){
            $update = $supplier->first()->update(
                [$field => $value]
            );
        } 
        else if(in_array($field, $supplierAddressFields)){
            $update = SupplierAddress::where('id', '=', $supplier->first()->address_id)->update(
                [$field => $value]
            );
        }else if(in_array($field, $supplierCompanyFields)){
            $update = SupplierCompany::where('id', '=', $supplier->first()->company_id)->update(
                [$field => $value]
            );
        }else if(in_array($field, $supplierContactFields)){
            $update = SupplierContact::where('id', '=', $supplier->first()->contact_id)->update(
                [$field => $value]
            );
        }
     
        if(!$update){
            return response()->json([1]);
        }else{
            return response()->json([2]);
        }
    
    
    }


}
