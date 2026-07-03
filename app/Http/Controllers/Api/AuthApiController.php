<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);


        if (!Auth::attempt($request->only('email', 'password'))) //o laravel faz a verificação, nessa condição colocamos a exclamação para inverter a afirmação, nesse caso se ele não estiver autenticado ele entrará na estrutura condicional 
        {
            return response()->json(['mensagem' => 'E-mail ou senha inválidos'], 401); // erro 401 diz que a teve aceitação do servidor mas o usuário não foi encontrado
        }

        $usuario = Auth::user(); // aqui pegamos todas as informações do usuário logado 

        $token = $usuario->createToken('api-token')->plainTextToken; // aqui criamos o token


        return response()->json([
            'token'=> $token,
            'usuario'=> $usuario
        ]);


    } // precisamos do request pra trazer o login e asenha do usuario

    public function logout(Request $request) {

        $request->user()->currentAccessToken()->delete();
        
        return response()->json([
            "mensagem" =>"logout Realizado"
        ]);
    }
}
