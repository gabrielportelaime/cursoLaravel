<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }
    public function listar(Request $request){
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')->get();
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }
    public function adicionar(Request $request){
        $msg = '';
        //inclusão
        if($request->input('_token') != '' && $request->input('id') == ''){
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
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
            $msg = 'Cadastro realizado com sucesso!';
        }
        //editar
        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());
            if($update){
                $msg = 'Registro atualizado!';
            }else{
                $msg = 'Registro não foi atualizado!';
            }
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
    public function editar($id){
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor]);
    }
    public function excluir($id){
        echo 'Método excluir!' . ' - ' . $id;
    }
}
