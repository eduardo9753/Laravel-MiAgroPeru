<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //LOS MISMOS CAMPOS DE TU BASE DE DATOS
        return [
            'titulo' => $this->faker->sentence(5),
            'precio' => $this->faker->numberBetween(1,100),
            'descripcion' => $this->faker->sentence(20),
            'imagen' => $this->faker->uuid().'.jpg',
            'user_id' => $this->faker->randomElement([1,2,3,4])
        ];
    }
}
