<?php

use App\Http\Controllers\ApiDash\HomeController;
use App\Http\Controllers\ApiDash\CategoryController;
use App\Http\Controllers\ApiDash\ReservationController;
use App\Http\Controllers\ApiDash\MenuController;
use App\Http\Controllers\ApiDash\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/ 
/* Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
}); */ 

Route::post('/login', function(Request $request){
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        $user = Auth::user();
        $token = $user->createToken('JWT');
        return response()->json([$token->plainTextToken, 200]);
    }
    return response()->json('Usuário inválido', 401);
});

Route::get('/reservations', [ReservationController::class,'index']);
Route::post('/reservations', [ReservationController::class,'create']);

Route::get('/category', [CategoryController::class,'index']);
Route::post('/category', [CategoryController::class,'create']);
Route::put('/category/{id}', [CategoryController::class,'edit']);
Route::delete('/category/{id}', [CategoryController::class,'destroy']);

Route::get('/menus', [MenuController::class,'index']);
Route::post('/menus', [MenuController::class,'store']);

Route::get('/users', [UserController::class,'index']);
Route::post('/users', [UserController::class,'create']);
Route::delete('/users/{id}', [UserController::class,'destroy']);

Route::get('/', [HomeController::class,'index']);


