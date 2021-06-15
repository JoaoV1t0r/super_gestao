<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public static function contato()
    {
        $motivo_contatos = MotivoContato::all();

        return view(view: 'site.contato', data: ['motivo_contatos' => $motivo_contatos]);
    }

    public static function salvar(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|min:3|max:40',
                'telefone' => 'required|min:12',
                'email' => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required'
            ],
            [
                'nome.min' => 'O campo nome precisa de no mínimo 3 caracteres',
                'nome.max' => 'O campo nome precisa de no máximo 40 caracteres',
                'email' => 'Insira um e-mail válido',
                'motivo_contatos_id.required' => 'O campo Motivo do Contato precisa ser preenchido',
                'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
                'required' => 'O campo :attribute deve ser preenchido'
            ]
        );

        //Gravação dos dados do formulário
        SiteContato::create($request->all());
        return redirect()->route(route: 'site.index');
    }
}