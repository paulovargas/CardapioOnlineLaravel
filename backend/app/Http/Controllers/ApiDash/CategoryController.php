<?php

namespace App\Http\Controllers\ApiDash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return response()->json($category);        
    }
    public function create(Request $request)
    {
        $category = new Category;
        $category->description = $request->description;
        $category->save();

        return response()->json(["message" => "Categoria cadastrada com sucesso!"], 201);
        
    }
}
