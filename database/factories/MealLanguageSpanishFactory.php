<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Meal;

class MealLanguageSpanishFactory extends Factory
{
    protected $model = MealLanguageSpanish::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'status' => $this->faker->randomElement(['created']),
            'description' => $this->faker->sentence,
            'ingredients' => $this->faker->randomDigit,
            'category' => $this->faker->randomDigit,
            'tags' => $this->faker->randomDigit,
        ];
    }
}
