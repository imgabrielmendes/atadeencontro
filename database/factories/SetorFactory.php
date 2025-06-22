<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setor>
 */
class SetorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $setoresEmpresa = [
            'Tecnologia da Informação',
            'Recursos Humanos',
            'Financeiro',
            'Compras',
            'Logística',
            'Marketing',
            'Jurídico',
            'Atendimento',
            'Engenharia',
            'Manutenção'
        ];

        return [
            'nome' => $this->faker->unique()->randomElement($setoresEmpresa),
            'status' => $this->faker->boolean(),
        ];
    }
}
