<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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



Route::get('/nombre/{nombre?}', [PersonaController::class , 'mostrarNombre']
)->where('nombre', '[A-Za-zñÑ]+');



Route::get('/id/{identificacion?}', function ($identificacion = null){
    if (!$identificacion) {
        return "Debe enviar una identificación";
    }
        return "Identificación: " .number_format($identificacion );
})->where('identificacion', '[0-9]+');


// use Illuminate\Support\Facades\DB;
// Route::get('/products', function () {

//    // $products = DB::table('products')->get();

//    $products =

//     return dd($products);

// });

Route::get('/products', [ProductController::class , "show"] );

Route::get('/product/delete/{id}',[ProductController::class, 'delete'])->name('product.delete');

Route::get('/product/form/{id?}', [ProductController::class, 'form'])->name('product.form');

Route::post('/product/save', [ProductController::class, 'save'])->name('product.save');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/brands' , [BrandController::class , "show"]);
Route::get('/brand/delete/{id}',[BrandController::class, 'delete'])->name('brand.delete');
Route::get('/brand/formBrand/{id?}', [BrandController::class, 'form'])->name('brand.formBrand');
Route::post('/brand/saveBrand', [BrandController::class, 'save'])->name('brand.saveBrand');

Route::get('/categories' , [CategoryController::class , "show"]);
Route::get('/categorie/delete/{id}',[CategoryController::class, 'delete'])->name('categorie.delete');
Route::get('/categorie/formCategorie/{id?}', [CategoryController::class, 'form'])->name('categorie.formCategorie');
Route::post('/categorie/saveCategorie', [CategoryController::class, 'save'])->name('categorie.saveCategorie');


