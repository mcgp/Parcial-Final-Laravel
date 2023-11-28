<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exhibicion>
 */
class ExhibitionFactory extends Factory
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
            'nombre' => $this->faker->randomElement(['Exhibicion de Aves', 'Exhibicion de Reptiles',
             'Exhibicion de Mamiferos', 'Exhibicion de Anfibios',
             'Exhibicion de Peces','Exhibicion de Ballenas', 'Exhibicion de Delfines',
              'Exhibicion de Tiburones', 'Exhibicion de Pinguinos', 'Exhibicion de Osos',
               'Exhibicion de Tigres', 'Exhibicion de Leones', 'Exhibicion de Jirafas',
                'Exhibicion de Elefantes', 'Exhibicion de Hipopotamos', 'Exhibicion de Cocodrilos',
                 'Exhibicion de Serpientes', 'Exhibicion de Tortugas', 'Exhibicion de Lagartos',
                  'Exhibicion de Iguanas', 'Exhibicion de Monos', 'Exhibicion de Gorilas',
                   'Exhibicion de Chimpances', 'Exhibicion de Koalas', 'Exhibicion de Canguros']),
            'descripcion' => $this->faker->randomElement(['Conoce esta hermosa especie a traves de datos curiosos',
        'Conoce esta curiosa especie e interactua', 'Conoce esta especie y aprende sobre su habitat',
        'Conoce esta especie y aprende sobre su alimentacion',
        'Conoce esta especie y aprende sobre su reproduccion',
         'Conoce esta especie y aprende sobre su comportamiento',
         'Conoce esta especie y aprende sobre su clasificacion']),
            'hora_inicio' => $this->faker->time(),
            'hora_fin' => $this->faker->time(),
            'ubicacion' => $this->faker->randomElement(['Zona A1', 'Zona Q0', 'ZONA C8', 'Zona D3', 'Zona E5',
             'Zona F2', 'Zona G4', 'Zona H1', 'Zona I0', 'Zona J8',
              'Zona K3', 'Zona L5', 'Zona M2', 'Zona N4', 'Zona O1', 'Zona P0']),
            'presentador' => $this->faker->name,
            'especie' => $this->faker->randomElement(['Avestruz', 'Ananconda', 'Hiena', 'Tortuga', 'Pez', 'Ballena',
             'Delfin', 'Tiburon', 'Pinguino', 'Oso', 'Tigre', 'Leon', 'Jirafa', 'Elefante', 'Hipopotamo',
              'Cocodrilo', 'Serpiente Coral', 'Tortuga', 'Lagarto', 'Iguana', 'Mono', 'Gorila', 'Chimpance',
               'Koala', 'Canguro']),
            'capacidad_maxima' => $this->faker->numberBetween(50, 200),
            'fecha_exhibicion' => $this->faker->date(),
            'category_id' => $this->faker->numberBetween(1, 3),
            'costo_entrada' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
