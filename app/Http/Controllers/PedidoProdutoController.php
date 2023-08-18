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
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        // $pedido->produtos; //eager loading
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required|gt:0',
        ];
        $feedbacks = [
            'produto_id.exists' => 'O produto informado não existe!',
            'required' => 'O campo :attribute deve possuir um valor válido!',
            'quantidade.gt' => 'O campo quantidade deve ser no mínimo 1!',
        ];
        $request->validate($regras, $feedbacks);
        // $pedido_produto = new PedidoProduto;
        // $pedido_produto->pedido_id = $pedido->id;
        // $pedido_produto->produto_id = $request->get('produto_id');
        // $pedido_produto->quantidade = $request->get('quantidade');
        // $pedido_produto->save();
        // $pedido->produtos; //Os registros do relacionamento
        $pedido->produtos()->attach($request->get('produto_id'), 
        ['quantidade' => $request->get('quantidade')]); //o objeto
        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PedidoProduto $pedido_produto, $pedido_id)
    {
        // print_r($pedido->getAttributes());
        // echo '<hr>';
        // print_r($produto->getAttributes());
        // echo $pedido->id.' - '.$produto->id;
        //convencional
        // PedidoProduto::where(['pedido_id' => $pedido->id, 'produto_id' => $produto->id])->delete();
        //detach (delete pelo relacionamento)
        // $pedido->produtos()->detach($produto->id);
        //ou ainda $produto->pedidos()->detach($pedido->id);
        $pedido_produto->delete();
        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id]);
    }
}
