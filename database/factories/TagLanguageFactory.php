<?php

namespace Database\Factories;
use App\Models\TagLanguage;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagLanguageFactory extends Factory
{
    protected $model = TagLanguage::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
        ];
    }
}