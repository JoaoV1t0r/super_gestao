<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public static function contato()
    {
        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public static function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required|min:12',
            'email' => 'required',
            'motivo' => 'required',
            'mensagem' => 'required'
        ]);

        //Gravação dos dados do formulário
        SiteContato::create($request->all());
        return self::contato();
    }
}
