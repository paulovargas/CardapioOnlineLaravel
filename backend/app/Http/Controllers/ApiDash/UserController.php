<?php

namespace App\Http\Controllers\ApiDash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
        
    }
    public function create(Request $request)
    {
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();

        return response()->json(["message" => "Usuário criado com sucesso!"], 201);
        
    }
    public function login(Request $request)
    {
        if(User::find(['email' => $request->email, 'password' => $request->password])){
            $user = User::find(['email' => $request->email, 'password' => $request->password]);
            dd($user);
            $token = $user->createToken('JWT');
            return response()->json($token->plainTextToken, 200);
        }
        return response()->json('Usuário inválido', 401);
        
    }

    public function destroy($request)
    {
        $user = User::find($request);
        $user->delete();

        return response()->json(["message" => "Usuário excluído com sucesso!"], 201);        
    }
}
