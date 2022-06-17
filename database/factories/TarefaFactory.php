<?php

namespace Database\Factories;

use App\Models\Tarefa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarefa>
 */
class TarefaFactory extends Factory
{
    /**
     * O nome do model correspondente da factory.
     *
     * @var string
     */
    protected $model = Tarefa::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tarefa' => $this->faker->unique()->text(maxNbChars:80),
            'data_limite_conclusao' => $this->faker->date(),
            'user_id' => 1,
        ];
    }
}
