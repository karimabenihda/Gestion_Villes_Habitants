<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Habitant;
use App\Models\Ville;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habitant>
 */
class HabitantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model=Habitant::class;

    public function definition(): array
    {
        return [
            'cin'=>$this->faker->unique()->numerify('######'),
            'nom'=>$this->faker->lastName,
            'prenom'=>$this->faker->firstName,
            'photo'=>$this->faker->imageUrl(),
            'ville_id'=>Ville::factory(),
        ];
    }
}
