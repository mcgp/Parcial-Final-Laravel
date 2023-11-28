<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre' => $this->faker->randomElement(['Educativa','Interactiva','Tematica']),
            'descripcion' => $this->faker->randomElement(['Exhibicion dedicada al aprendizaje',
            'Exhibicion dedicada a la interaccion'
            ,'Exhibicion dedicada a la tematica del dia']),
            'costo_promedio' => $this->faker->randomFloat(2, 0, 100),
            'edad_minima' => $this->faker->randomElement(['5','10','15','18']),
        ];
    }
}
