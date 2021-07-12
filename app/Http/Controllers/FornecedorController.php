<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedores.index');
    }

    public function listar(Request $request)
    {
        // $params = $request->all();
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(2);

        return view('app.fornecedores.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function viewCadastrar()
    {
        return view('app.fornecedores.adicionar');
    }

    public function cadastrar(Request $request)
    {
        if ($request->id == '') {
            $newFornecedor = $request->all();

            $validation = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => "O nome deve ter no mínimo 3 caracteres",
                'nome.max' => "O nome deve ter no máximo 40 caracteres",
                'uf.min' => "O UF deve ter no mínimo 2 caracteres",
                'uf.max' => "O UF deve ter no máximo 2 caracteres",
                'email.email' => "O campo e-mail não foi preenchido corretamente"
            ];

            $request->validate($validation, $feedback);


            Fornecedor::create($newFornecedor);


            return redirect()->route(route: 'app.fornecedor.cadastrar', parameters: ['message_success' => 'Fornecedor Cadastrado com sucesso']);
        } else if ($request->id != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $updatedFornecedor = $fornecedor->update($request->all());


            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'message_success' => 'Fornecedor editado com sucesso']);
        } else {
            return view('app.fornecedores.adicionar');
        }
    }

    public function editar(Request $request, $id)
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedores.adicionar', ['fornecedor' => $fornecedor]);
    }

    public function delete(Request $request, $id)
    {
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor', ['message_success' => "Fornecedor de Id $id foi deletado"]);
    }
}