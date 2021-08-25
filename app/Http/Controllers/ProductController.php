<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    function show(){
        $productList = Product::all();
        return view('product/list',['list'=>$productList]);
    }

    function delete($id){
        //Product::destroy($id);

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products')->with('message' , 'El producto fue borrado');
    }

    function form ($id = null){
        $product = new Product();
        $brands = Brand::orderBY('brand')->get();
        $categories = Category::orderBY('name')->get();
        if ($id != null ) {
            $product = Product::findOrFail($id);
        }
        return view('product/form', ['product' => $product , 'brands'=> $brands , 'categories'=>$categories]);
    }

    function save(Request $request){

        $request->validate([
            'name' => 'required|max:50',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'brand' => 'required|max:50'

        ]);

        $product = new Product();
        $message = 'Se ha creado un nuevo producto';

        if (intval($request->id)>0){
            $product = Product::findOrFail($request->id);
            $message = 'Se ha Editado un producto';
        }

        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand;
        $product->category_id = $request->name;

        $product->save();
        return redirect('/products')->with('messa' , $message);

    }
}
