<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uploadController extends Controller
{
    public function upload(Request $request)
    {
        return response()->json($request->all());
        /* $reservations = new Reservation;
        $reservations->name = $request->name;
        $reservations->dta_reservation = $request->dta_reservation;
        $reservations->hr_reservation = $request->hr_reservation;
        $reservations->qtd = $request->qtd;
        $reservations->phone = $request->phone;
        $reservations->save();

        return response()->json(["message" => "Reservar efetuada com sucesso!"], 201); */
        
    }
}
