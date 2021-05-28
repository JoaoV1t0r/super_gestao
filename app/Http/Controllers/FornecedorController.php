<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            'fornecedor1' => 'Fornecedor X',
            'fornecedor2' => 'Fornecedor Y',
            'fornecedor3' => 'Fornecedor Z'
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
