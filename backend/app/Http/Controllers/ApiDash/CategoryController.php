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
    public function edit(Request $request, $id)
    {
        //dd($request);
        //dd($id);
        $oldCategory = Category::find($id);
        $oldCategory->update($request->all());

        return response()->json(["message" => "Categoria alterada com sucesso!"], 201);        
    }
    public function destroy($request)
    {
        $category = Category::find($request);
        $category->delete();

        return response()->json(["message" => "Categoria excluída com sucesso!"], 201);        
    }
}
