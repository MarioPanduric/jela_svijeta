<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CategoryLanguageLanguage;

class CategoryLanguageSpanishFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'title' => $faker->word,
            'slug' => $faker->slug,
        ];
    }
}
