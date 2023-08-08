<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Fornecedor
//fornecedors --> ou seja, vai dar erro, porque a tabela não corresponde

class Fornecedor extends Model
{
    protected $table = 'fornecedores';
    //Para poder persistir os dados corretamente, pois a geração automática da tabela seria fornecedors --> errado
    use HasFactory;
}
