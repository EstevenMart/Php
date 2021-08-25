<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        $categorieList = Category::all();
        return view('categorie/listCategorie',['listCategorie'=>$categorieList]);
    }

     function delete($id){
        $categorie = Category::findOrFail($id);
        $categorie->delete();
        return redirect('/categories')->with('message' , 'Categoria borrada');
    }
    function form ($id = null){
        $categorie = new Category();
        if ($id != null ) {
            $categorie = Category::findOrFail($id);
        }
        return view('categorie/formCategorie', ['categorie' => $categorie]);
    }
    function save(Request $request){

        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:50'
        ]);

        $categorie = new Category();
        $message = 'Se ha creado una nueva Categoria';

        if (intval($request->id)>0){
            $categorie = Category::findOrFail($request->id);
            $message = 'Se ha Editado la Categoria';
        }

        $categorie->name = $request->name;
        $categorie->description = $request->description;

        $categorie->save();
        return redirect('/categories')->with('messa' , $message);

    }

}
