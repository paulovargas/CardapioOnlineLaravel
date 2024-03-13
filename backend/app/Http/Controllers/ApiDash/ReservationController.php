<?php

namespace App\Http\Controllers\ApiDash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return response()->json($reservations);
        
    }
    public function create(Request $request)
    {
        $reservations = new Reservation;
        $reservations->name = $request->name;
        $reservations->dta_reservation = $request->dta_reservation;
        $reservations->hr_reservation = $request->hr_reservation;
        $reservations->qtd = $request->qtd;
        $reservations->phone = $request->phone;
        $reservations->save();

        return response()->json(["message" => "Reservar efetuada com sucesso!"], 201);
        
    }
}
