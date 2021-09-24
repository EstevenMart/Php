<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('category.listcategory',  ['categories' =>$categories]);
    }

    function form($id=null){
        $category = new Category();
        if($id != null){
            $category = Category::findOrFail($id);
        }
        return view('category.form', ['category' => $category]);
    }

    function save(Request $request){
        $request->validate([
            'name' =>'required|max:50',
            'description' =>'required|max:50'
        ]);

        $category = new Category();
        $message_new = "Nueva categoria";
        if(intval($request->id)>0){
            $category = Category::findOrFail($request->id);
            $message_new = "Edit complete";
        }

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect('/categories')->with('message_new' , $message_new);

    }
    function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/categories')->with('message' , 'categoria borrada');
    }


}
