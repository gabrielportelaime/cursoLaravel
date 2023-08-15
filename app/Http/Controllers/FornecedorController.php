<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }
    public function listar(){
        return view('app.fornecedor.listar');
    }
    public function adicionar(Request $request){
        if($request->input('_token') != ''){
            //validacao
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];
            $feedback = [
                'required' => 'O campo :attribute é obrigatório!',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres!',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres!',
                'uf.min' => 'O UF nome deve ter 2 caracteres!',
                'uf.max' => 'O UF nome deve ter 2 caracteres!',
                'email' => 'O campo email deve ser um email válido!',
            ];
            $request->validate($regras, $feedback);
            echo 'Chegamos até aqui!';
        }
        return view('app.fornecedor.adicionar');
    }  
}
