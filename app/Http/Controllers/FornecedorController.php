<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome' => 'Honda', 
                'status' => 'N',
                'cnpj' => '00.111.333/4444-22',
                'ddd' => '11',
                'telefone' => '91234-5678'
            ],
            1 => [
                'nome' => 'Yamaha', 
                'status' => 'S',
                'cnpj' => '00.394.460/0058-87',
                'ddd' => '85',
                'telefone' => '99999-8888'
            ],
            2 => [
                'nome' => 'Sefaz', 
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '32',
                'telefone' => '98888-8888'
            ]
        ];
        // $fornecedores = [];
        return view('app.fornecedor.index', ['fornecedores' => $fornecedores]);
    }
}
