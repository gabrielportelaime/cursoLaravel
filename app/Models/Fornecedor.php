<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//Fornecedor
//fornecedors --> ou seja, vai dar erro, porque a tabela não corresponde

class Fornecedor extends Model
{
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];
    use SoftDeletes;
    //Para poder persistir os dados corretamente, pois a geração automática da tabela seria fornecedors --> errado
    use HasFactory;
}
