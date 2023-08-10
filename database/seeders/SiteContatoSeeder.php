<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;
use Database\Factories\SiteContatoFactory;
use Faker\Factory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
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
