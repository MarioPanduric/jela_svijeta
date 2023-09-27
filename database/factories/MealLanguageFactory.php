<?php

namespace Database\Factories;
use App\Models\MealLanguage;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealLanguageFactory extends Factory
{
    protected $model = MealLanguage::class;

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
}