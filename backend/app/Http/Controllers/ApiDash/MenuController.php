<?php

namespace App\Http\Controllers\ApiDash;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
use Image;
use File;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();       
        
        foreach( $menu as $item => $name){
            $path = $name->image;            
            $url = Storage::url($path);
            $name->image = $url;            
        }      
        return response()->json($menu);        
    }
    public function store(MenuStoreRequest $request)
    {
        $input = $request->validated();
        $image = $input['image'];
        $path = $image->store('images','public');
        $input['image'] = $path;
        $menu = Menu::create($input);

        return response()->json(["message" => "Prato salvo com sucesso!"], 201);
        
    }
}
