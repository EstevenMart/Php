<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function show()
    {
            $invoices = Invoice::all();
            return view('invoice.list', ['invoices' => $invoices]);
    }

    function form ($id = null){
        $products = Product::all();
        return view('invoice.form', compact('products'));
    }

}
