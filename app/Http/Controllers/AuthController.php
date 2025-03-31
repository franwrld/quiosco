<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegistroRequest $request) {
        // Validar el registro
        $data = $request->validated();
        //Crear/Registrar usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        // Retornar una respuesta
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];
    }
    public function login(LoginRequest $request) {
        // Validar el login
        $data = $request->validated();
        // Revisar el password
        if(!Auth::attempt($data)) {
            return response([
                'errors' => ['El email o el password son incorrectos']
            ], 422);
        }

        // Autenticar Usuario
        $user = Auth::user();
        return response()->json([
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ])->header('Access-Control-Allow-Origin', '*')
          ->header('Access-Control-Allow-Credentials', 'true');
    }
    public function logout(Request $request) {
        
    }
}
