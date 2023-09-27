<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class IngredientLanguageSpanishFactory extends Factory
{
 
    protected $model = IngredientLanguageSpanish::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
        ];
    }
}
