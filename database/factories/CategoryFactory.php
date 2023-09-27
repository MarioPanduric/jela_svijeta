<?php


namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'slug' => $this->faker->slug,
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Category $category) {
        })->afterCreating(function (Category $category) {
        });
    }

    public function hr()
    {
        return $this->state(function (array $attributes) {
            return [
                'title' => $this->faker->foodName,
                'slug' => $this->faker->slug,
            ];
        });
    }
}