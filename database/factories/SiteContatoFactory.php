<?php

namespace Database\Factories;

use App\Models\MotivoContato;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $motivo_contatos = MotivoContato::all();
        $min = $motivo_contatos->first()->id;
        $max = $motivo_contatos->last()->id;
        return [
            'nome' => fake()->name(),
            'telefone' => fake()->phoneNumber(),
            'email' => fake()->unique()->email(),
            'motivo_contatos_id' => fake()->numberBetween($min, $max),
            'mensagem' => fake()->text(200)
        ];
    }
}
