<?php

namespace Database\Factories;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    protected $model = Meal::class;

    public function definition()
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
    public function configure()
    {
        return $this->afterMaking(function (Meal $meal) {
        })->afterCreating(function (Meal $cmeal) {
        });
    }

    public function hr()
    {
        return $this->state(function (array $attributes) {
            return [
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['created']),
            'ingredients' => $this->faker->randomDigit,
            'categories' => $this->faker->randomDigit,
            'tags' => $this->faker->randomDigit,
            ];
        });
    }
}