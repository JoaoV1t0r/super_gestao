<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Pedido $pedido)
    {
        // return response()->json($pedido->produtos);
        $produtos = Produto::all();
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $validated = [
            'produto_id' => 'exists:produtos,id',
        ];
        $messages = [
            'produto_id.exists' => "O produto informada é inválida",
        ];

        $request->validate($validated, $messages);

        $produto_id = $request->produto_id;

        // PedidoProduto::create([
        //     'pedido_id' => $pedido->id,
        //     'produto_id' => $produto_id,
        //     'quantidade' => $request->quantidade ?? 1
        // ]);

        $pedido->produtos()->attach($produto_id, ['quantidade' => $request->quantidade ?? 1]);

        return redirect()->route('pedido_produto.create', ['pedido' => $pedido]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function show(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto)
    {
        //
    }
}