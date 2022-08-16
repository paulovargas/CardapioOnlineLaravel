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
            

            $image = Storage::get($path);
           /*  $this->imagem = Image::make($img);
            $response = Response::make($this->imagem->encode('jpeg'));
            $response->header('Content-Type', 'image/jpeg');
            $name->image = $response; */
            $img = Image::make($image);
            $name->image = response()->make($img);
            //echo $name->image;


           
            
        }
        //echo $menu;
        //return $response;

        //dd(json_decode($menu));
        //$menu->image = $file;
 
        //$storage = Storage::disk('public');
        //$menus = Menu::all();
        ///*  */$this->foto = Menu::find($menus->image);

        //Storage::disk('public')->get('image/KAgIutWhaUMQRJiM9ZObzMVwNTVfjSPYW3LeEML0.jpg'); 

        /* $arquivo = Storage::get('public/images/KAgIutWhaUMQRJiM9ZObzMVwNTVfjSPYW3LeEML0.jpg'); 
        $this->imagem = Image::make($arquivo);

        $response = Response::make($this->imagem->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');

        return $response; */
        //dd($menus->image);
        //$menus['image'] = './public/images/' . $image;
        //dd($menus);
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
