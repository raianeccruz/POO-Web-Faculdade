<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(AuthLoginRequest $request)
    {
        //obtem os dados informados pelo usuario na tentativa de login
        $username = $request->validated('username');
        $password = $request->validated('password');

        //tenta carregar o usuario pelo username (email)
        $user = User::firstWhere('email', $username);

        if (
            //se houver usuario, tenta validar a senha informada
            $user && 
            Hash::check($password, $user->password)
        ) {
            //se tudo ok, registra o token de acesso do mesmo
            $token = $user->createToken($user->name);

            //retorna o token de acesso e os dados do usuario
            return [
                'token' => $token->plainTextToken,
                'user' => $user,
            ];
        }

        //caso contrario, retorna erro de credenciais invalidas
        return response()->json([
            'message' => 'Credenciais invalidas',
        ], Response::HTTP_UNAUTHORIZED);
    }
}
