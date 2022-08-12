<?php

namespace App\Http\Controllers\ApiDash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class HomeController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return response()->json($reservations);        
    }
}
