<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    public function run(): void
    {
        // $contato = new SiteContato();
        // $contato->nome = 'João';
        // $contato->telefone = '(92) 91111-2222';
        // $contato->email = 'joao@gmail.com';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Elogio bom';
        // $contato->save();
        SiteContato::factory()->count(100)->create();
    }
}
