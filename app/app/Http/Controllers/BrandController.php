<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        $brandList = Brand::all();
        return view('brand/listBrand' , ['listBrand' =>$brandList]);
    }

    function delete($id){
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect('/brands')->with('message' , 'Marca borrada');
    }

    function form($id=null){
        $brand = new Brand();
        if($id != null){
            $brand = Brand::findOrFail($id);
        }
        return view('brand/formBrand', ['brand' => $brand]);
    }

    function save(Request $request){
        $request->validate([
            'brand' =>'required|max:50',
        ]);

        $brand = new Brand();
        $message_new = "Nueva Marca";
        if(intval($request->id)>0){
            $brand = Brand::findOrFail($request->id);
            $message_new = "Edit complete";
        }

        $brand->brand = $request->brand;


        $brand->save();
        return redirect('/brands')->with('message_new' , $message_new);

    }
}
