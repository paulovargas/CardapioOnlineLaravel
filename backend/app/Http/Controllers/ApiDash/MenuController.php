<?php

namespace App\Http\Controllers\ApiDash;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
use Image;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
       
        //$file =  Image::url("images/KAgIutWhaUMQRJiM9ZObzMVwNTVfjSPYW3LeEML0.jpg");//Image::make('images/KAgIutWhaUMQRJiM9ZObzMVwNTVfjSPYW3LeEML0.jpg');
        
        foreach( $menu as $item => $name){
            $path = $name->image;
            

            $img = Storage::get($path);
            $image = Image::make($img);
           /*  $this->imagem = Image::make($img);
            $response = Response::make($this->imagem->encode('jpeg'));
            $response->header('Content-Type', 'image/jpeg');
            $name->image = $response; */

            //$image = Storage::get($path);
            //$name->image = Image::make($image)->resize(320, 240);
            //echo Image::make($image)->resize(320, 240);

            //echo Storage::url($path);

            //echo $image;
            
            //$name->image = response()->make($image->encode($image->mime()), 200, array('Content-Type' => 'image' . $image->mime()));
            //echo $name->image;      
            
        }      
        return response()->json($menu);        
    }
    public function store(MenuStoreRequest $request)
    {
        $input = $request->validated();
        //dd($input);
        $image = $input['image'];
        $path = $image->store('images','public');
        $input['image'] = "public/$path";
        $menu = Menu::create($input);       

        return response()->json(["message" => "Prato salvo com sucesso!"], 201);
        
    }
}
