<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //instanciando o objeto para poder persistir no banco
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Jorge';
        $fornecedor->site = 'www.jorge.com.br';
        $fornecedor->uf = 'AM';
        $fornecedor->email = 'contato@jorge.com';
        $fornecedor->save();
        //usando o método create da classe --> lembrar do $fillable = [campos do objeto]
        Fornecedor::create([
            'nome' => 'Maria',
            'site' => 'www.maria.com.br',
            'uf' => 'CE',
            'email' => 'contato@maria.com'
        ]);
        //insert
        // DB::table('fornecedores')->insert([
        //     'nome' => 'João',
        //     'site' => 'www.joao.com.br',
        //     'uf' => 'RS',
        //     'email' => 'contato@joao.com'
        // ]);        
    }
}
