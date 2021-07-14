<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::paginate(5);
        return view('app.client.index', ['clientes' => $clientes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = [
            'nome' => 'required|min:3'
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => "O nome deve ter no mínimo 3 caracteres"
        ];

        $request->validate($validated, $messages);
        $nome = $request->nome;

        Cliente::create(['nome' => $nome]);

        return redirect()->route('cliente.create', ['message_success' => 'Cliente criado com sucesso.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('app.client.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('app.client.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validated = [
            'nome' => 'required|min:3'
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => "O nome deve ter no mínimo 3 caracteres"
        ];

        $request->validate($validated, $messages);
        $cliente->update($request->all());

        return redirect()->route('cliente.edit', ['cliente' => $cliente, 'message_success' => 'Cliente atualizado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}