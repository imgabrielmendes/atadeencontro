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
            'Auditório Principal',
            'Sala de Reunião 1',
            'Sala de Reunião 2',
            'Departamento de Recursos Humanos',
            'Departamento Financeiro',
            'Centro de Processamento de Dados (CPD)',
            'Laboratório de Informática',
            'Área de Convivência',
            'Refeitório',
            'Copa',
            'Estacionamento Interno',
            'Almoxarifado',
            'Sala da Diretoria',
            'Sala da Gerência',
            'Sala de Atendimento ao Cliente',
            'Central de Chamados',
            'Espaço de Treinamento',
            'Biblioteca Corporativa',
            'Sala de Impressão'
        ];

        return [
            'nome' => $this->faker->unique()->randomElement($locaisEmpresa),
            'status' => $this->faker->boolean(),
            'id_local' => $this->faker->unique()->numberBetween(1, 100),
        ];
    
    }
}
