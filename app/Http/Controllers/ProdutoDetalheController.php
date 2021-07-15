<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produto_detalhes = ProdutoDetalhe::with(['produto'])->paginate(3);

        // dd($produto_detalhes);
        // echo $produto_detalhes[0]->toJson();
        // exit;

        return view('app.produto_detalhes.index', ['produto_detalhes' => $produto_detalhes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhes.create', ['unidades' => $unidades]);
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
        $validated = [
            'produto_id' => 'exists:produtos,id',
            'comprimento' => 'required|integer',
            'largura' => 'required|integer',
            'altura' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido',
            'integer' => "O :attribute deve ser um inteiro",
            'unidade_id.exists' => "A unidade informada é inválida",
            'produto_id.exists' => "O produto informada é inválida",
        ];

        $request->validate($validated, $messages);

        ProdutoDetalhe::create($atribbutes);
        // $unidades = Unidade::all();
        return redirect()->route('produto_detalhes.create', ['message_success' => 'Detalhes do produto criado com sucesso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoDetalhe $produto_detalhe)
    {
        dd($produto_detalhe->produto->nome);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoDetalhe $produto_detalhe)
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhes.edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        $new_atribbutes = $request->all();
        $validated = [
            'produto_id' => 'exists:produtos,id',
            'comprimento' => 'required|integer',
            'largura' => 'required|integer',
            'altura' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido',
            'integer' => "O :attribute deve ser um inteiro",
            'unidade_id.exists' => "A unidade informada é inválida",
            'produto_id.exists' => "O produto informada é inválida",
        ];

        $request->validate($validated, $messages);

        $produto_detalhe->update($new_atribbutes);
        // $unidades = Unidade::all();
        return redirect()->route('produto_detalhes.edit', ['produto_detalhe' => $produto_detalhe, 'message_success' => 'Detalhes do produto atualizados com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoDetalhe $produto_detalhe)
    {
        //
    }
}