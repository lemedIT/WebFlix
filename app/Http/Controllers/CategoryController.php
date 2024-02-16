<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // return Category::all(); // SELECT * FROM categories

        return view('categories/index', [
            'categories' => Category::all(),
        ]);


    }


    public function create()

    {
        return view('categories/create');
    }

    public function store(Request $request)
    {
        /* --------------------------------------------------------------
        Validation du champ name. Si aucune erreur, on va dans le save 
        si il y a une erreur Lavarel renvoie vers le form avec les errurs
        -------------------------------------------------------------- */ 
    $request->validate([
        'name' => 'required|min:3|unique:categories|max:10',
    ]);

        // Insertion en base de données
        $category = new Category();
        // $request->name est le contenu de value
        $category->name = $request->name;
        $category->save(); // INSERT INTO ... en Laravel 
        
        return redirect('/categories');
        
    }
}
