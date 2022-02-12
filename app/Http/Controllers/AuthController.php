<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponser;
    //Controller de autenticação do Usuário

    public function register(Request $request)
    {
        //Validação da entrada de dados (Opcional, criar Request separado)
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        //Criação do usuario
        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        //Msg da ApiResponser
        return $this->success([
            'token' => $user->createToken('API Token')->plainTextToken
        ], 'Usuário criado, segue token de acesso!');
    }

    public function login(Request $request)
    {
        // Confere login, retorna token;
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return $this->error('Credenciais não batem.', 401);
        }

        return $this->success([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ],'Login realizado com sucesso. Utilize o token para acessar as demais chamadas.');
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Excluídos'
        ];
    }
}
