<?php

namespace Database\Factories;

use App\Models\SiteContato;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SiteContatoFactory extends Factory
{
    protected $model = SiteContato::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'telefone' => $this->faker->tollFreePhoneNumber(),
            'email' => $this->faker->unique()->email(),
            'motivo_contatos_id' => $this->faker->numberBetween(1, 3),
            'mensagem' => $this->faker->text(200)
        ];
    }
}
