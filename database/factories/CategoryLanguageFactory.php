<?php

namespace Database\Factories;
use App\Models\CategoryLanguage;
use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryLanguageFactory extends Factory
{
    protected $model = CategoryLanguage::class;

    public function definition()
    {


        return [
            'title' => $faker->word,
            'slug' => $faker->slug,
        ];
    }
}


