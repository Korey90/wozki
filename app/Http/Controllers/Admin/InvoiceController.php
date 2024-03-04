<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){
        $invoices = Invoice::with('invoiceProducts')->get();
        //dd($invoices);
        return view('admin.invoice.index')->with(['invoices' => $invoices]);
    }

    public function show($invoice_number){
        $invoice = Invoice::where('invoice_number', $invoice_number)->with('invoiceProducts','invoiceDelivery')->first();

        //dd($invoice);

        return view('admin.invoice.show')->with(['invoice' => $invoice]);
    }
}
