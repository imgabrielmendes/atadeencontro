<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\local>
 */
class LocalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

    $locaisEmpresa = [
        'Recepção',
        'Almoxarifado',
        'Sala de Reunião',
        'Departamento de RH',
        'Financeiro',
        'TI',
        'Copa',
        'Gerência',
        'Escritório',
        'Auditoria'
    ];

    return [
        'nome' => $this->faker->randomElement($locaisEmpresa),
        'status' => $this->faker->boolean(),
    ];
    
    }
}
