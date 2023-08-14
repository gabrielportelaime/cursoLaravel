<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    public function run(): void
    {
        SiteContato::factory()->count(10)->create();
    }
}
