<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        session_start();
        if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
            return redirect()->route('cliente.index');
        }

        $erro = $request->get('erro');

        return view(view: 'site.login', data: ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        session_start();
        if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
            return redirect()->route('cliente.index');
        }

        $regras = [
            'email' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'email.email' => 'O campo e-mail é obrigatório',
            'senha.required' => "O campo senha é obrigatório"
        ];

        $request->validate($regras,  $feedback);

        $email = $request->get('email');
        $password = $request->get('senha');

        $user = User::where('email', $email)->where('password', $password)->get()->first();

        if (isset($user)) {
            $_SESSION['nome'] = $user->name;
            $_SESSION['email'] = $user->email;

            return redirect()->route('cliente.index');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair(Request $request)
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}