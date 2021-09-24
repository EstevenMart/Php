<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/nombre/{unaVariable}', function ($unaVariable) {
    return "Nombre: ".ucwords($unaVariable);
})->where('unaVariable' , '[A-Za-zñÑ]+');




Route::get('/numero/{documento}', [PersonaController::class, 'mostrarNombre']
)->where('documento' , '[0-9]+');


Route::get('/numero/{unaVariable?}', function ($unaVariable = null) {

    if(!$unaVariable){
        //Cuando sea null ejecutar esto
       return "Debe enviar un valor númerico";
    }
    return number_format($unaVariable);

})->where('documento' , '[0-9]+');

// Route::get('/products', function () {
//   $products = DB::table('products')->get();
//    return dd($products);
// });

Route::get('/products' , [ProductController::class , "show"]);

Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/product/form/{id?}', [ProductController::class, 'form'])->name('product.form');

Route::post('/product/save', [ProductController::class, 'save'])->name('product.save');
//[0-9]+

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/brands' , [BrandController::class, "show"]);

Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

Route::get('/brand/formBrand/{id?}', [BrandController::class, 'form'])->name('brand.form');

Route::post('/brand/save', [BrandController::class, 'save'])->name('brand.save');


Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');

Route::get('/categories/form/{id?}', [CategoryController::class, 'form'])->name('category.form');

Route::post('/categories/save', [CategoryController::class, 'save'])->name('category.save');

Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

// Route::get('/invoice/{id}', function($id){
//     $invoice = App\Models\Invoice::findOrfail($id);
//     return dd($invoice->products);
// });

Route::get('invoices', [InvoiceController::class, 'show']);
Route::get('invoice/form', [InvoiceController::class, 'form'])->name('invoice.form');
