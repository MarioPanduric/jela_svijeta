<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class TagLanguageSpanishFactory extends Factory
{
    protected $model = TagLanguageSpanish::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
        ];
    }
}
