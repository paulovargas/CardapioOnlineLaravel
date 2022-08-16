<?php

namespace App\Http\Controllers\ApiDash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use File;


class HomeController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return response()->json($reservations);        
    }
    public function displayImage($filename)
    { 
        $path = 'public/7Rzq65i4h7k7CdxI4MkH0ABFiLQ19JANzTzdWRQM.jpg';   

        if (!File::exists($path)) {    
            abort(404);    
        }     
    
        $file = File::get($path);
        $type = File::mimeType($path);      
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);    
    
        return $response;
     }
}
