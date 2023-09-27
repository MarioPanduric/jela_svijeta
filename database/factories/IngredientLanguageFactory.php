<?php

namespace Database\Factories;
use App\Models\IngredientLanguage;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientLanguageFactory extends Factory
{
    protected $model = IngredientLanguage::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
        ];
    }
}