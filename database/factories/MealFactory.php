<?php

namespace Database\Factories;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    protected $model = Meal::class;

    public function definition()
    {
        $size = rand(1, 9);
        $ingredientIDs = [];
        for ($i = 0; $i < $size; $i++) {
            $random_id = $this->faker->numberBetween(1, 9);
            if (!in_array($random_id, $ingredientIDs)) {
                array_push($ingredientIDs, $random_id);
            }
            
        }

        $tags_size = rand(1, 9);
        $tagIDs = [];
        for ($i = 0; $i < $tags_size; $i++) {
            $random_id = $this->faker->numberBetween(1, 9);
            if (!in_array($random_id, $tagIDs)) {
                array_push($tagIDs, $random_id);
            }
            
        }
        return [
            'title' => $this->faker->word,
            'status' => $this->faker->randomElement(['created']),
            'description' => $this->faker->sentence,
            'ingredients' =>  json_encode($ingredientIDs),
            'category' => $this->faker->randomDigit,
            'tags' => json_encode($tagIDs),
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