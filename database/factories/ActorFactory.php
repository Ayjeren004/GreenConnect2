<?php
namespace Database\Factories;

use App\Models\Actor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActorFactory extends Factory
{
    protected $model = Actor::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'birth_date' => $this->faker->date,
            'nationality' => $this->faker->country,
            // Add more specific attributes if needed
        ];
    }
}
