<?php
namespace App\Http\Controllers;
use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(){
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }
    public function salvar(Request $request){
        //Realizar a validação dos dados antes de salvar
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        $respostas = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres!',
            'nome.max' => 'O campo nome pode ter no máximo 40 caracteres!',
            'nome.unique' => 'O nome informado já está em uso!',
            'email.email' => 'O email informado não é válido!',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres!',
            'required' => 'O campo :attribute deve ser preenchido!',
        ];
        $request->validate($regras, $respostas);
        //Salvando o contato no banco de dados
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
