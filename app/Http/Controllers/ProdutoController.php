<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::with(['produtoDetalhe', 'fornecedor'])->paginate(3);
        // dd($produtos[0]->produtoDetalhe->largura);
        // dd($produtos);
        // return response()->json($produtos);
        return view('app.produtos.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produtos.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atribbutes = $request->all();

        // return response()->json($atribbutes);
        $validated = [
            'nome' => 'required|max:15',
            'descricao' => 'required|max:255',
            'peso' => 'required|integer',
            'fornecedor_id' => 'exists:fornecedores,id',
            'unidade_id' => 'exists:unidades,id',
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.max' => "O nome deve ter no máximo 15 caracteres",
            'descricao.max' => "A descrição deve ter no máximo 255 caracteres",
            'peso.integer' => "O peso deve ser um inteiro",
            'fornecedor_id.exists' => "O fornecedor informada é inválida",
            'unidade_id.exists' => "A unidade informada é inválida",
        ];

        $request->validate($validated, $messages);

        Produto::create($atribbutes);

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produtos.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produtos.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $validated = [
            'nome' => 'required|max:15',
            'descricao' => 'required|max:255',
            'peso' => 'required|integer',
            'fornecedor_id' => 'exists:fornecedores,id',
            'unidade_id' => 'exists:unidades,id',
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.max' => "O nome deve ter no máximo 15 caracteres",
            'descricao.max' => "A descrição deve ter no máximo 255 caracteres",
            'peso.integer' => "O peso deve ser um inteiro",
            'fornecedor_id.exists' => "O fornecedor informada é inválida",
            'unidade_id.exists' => "A unidade informada é inválida",
        ];

        $request->validate($validated, $messages);

        $new_atribbutes = $request->all();
        $produto->update($new_atribbutes);

        return redirect()->route('produto.edit', ['produto' => $produto, 'message_success' => 'Produto atualizado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index', ['message_success' => 'Produto excluido com sucesso.']);
    }
}