<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ville>
 */
class VilleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $mode=Ville::class;
    public function definition(): array
    {
        return [
        'ville'=>$this->faker->city,
        'nombreHabitant'=>$this->faker->numberBetween(1000,100000),
        ];
    }
}
