<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];
    use HasFactory;
    public function produtoDetalhe(){
        return $this->hasOne('App\Models\ProdutoDetalhe');
        /*
        Produto tem 1 ProdutoDetalhe
        1 registro relacionado em produto_detalhes (fk) -> produto_id
        produtos (pk) -> id
        */
    }
}
