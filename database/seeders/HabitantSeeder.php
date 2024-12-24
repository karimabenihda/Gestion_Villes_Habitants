<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Habitant;

class HabitantSeeder extends Seeder
{
    public function run()
    {
        // Create 50 Habitants
        Habitant::factory()->count(10)->create();
    }
}
