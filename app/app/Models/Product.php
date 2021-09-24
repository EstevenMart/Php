<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //protected $table = "productos";
    function brand(){
        return $this->belongsTo(Brand::class);
    }

    function category(){
        return $this->belongsTo(Category::class);
    }

    function invoices(){
        return $this->belongsToMany(Invoice::class, 'invoice_details');
    }
}
