<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryLanguage;
use App\Models\CategoryLanguageSpanish;
use App\Models\Meal;
use App\Models\MealLanguage;
use App\Models\MealLanguageSpanish;
use App\Models\Ingredient;
use App\Models\IngredientLanguage;
use App\Models\IngredientLanguageSpanish;
use App\Models\Tag;
use App\Models\TagLanguage;
use App\Models\TagLanguageSpanish;

use Stichoza\GoogleTranslate\GoogleTranslate;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        
        $meals = Meal::factory()->count(10)->create();

        foreach($meals as $meal){
            $translatedTitle = self::translateToCroatian($meal->title);
            $translatedDescription = self::translateToCroatian($meal->description);
            $ingredient_id = $meal->ingredients;
            $category_id = $meal->category;
            $tag_id = $meal->tags;
            $created_at = $meal->created_at;
            $updated_at = $meal->updated_at;

            
            MealLanguage::create([
                'title' => $translatedTitle,
                'description' => $translatedDescription,
                'ingredients' => $ingredient_id,
                'tags' => $tag_id,
                'category' => $category_id,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);

            $translatedTitle = self::translateToSpanish($meal->title);
            $translatedDescription = self::translateToSpanish($meal->description);

            MealLanguageSpanish::create([
                'title' => $translatedTitle,
                'description' => $translatedDescription,
                'ingredients' => $ingredient_id,
                'tags' => $tag_id,
                'category' => $category_id,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
        }
        $categories = Category::factory()->count(10)->create();

        
        foreach ($categories as $category) {
        
            $translatedTitle = self::translateToCroatian($category->title);
            $translatedSlug = self::translateToCroatian($category->slug);

            $translatedTitleSpanish = self::translateToSpanish($category->title);
            $translatedSlugSpanish = self::translateToSpanish($category->slug);

            CategoryLanguage::create([
                'title' => $translatedTitle,
                'slug' => $translatedSlug,
            ]);

            CategoryLanguageSpanish::create([
                'title' => $translatedTitleSpanish,
                'slug' => $translatedSlugSpanish,
            ]);
        }
        $ingredients = Ingredient::factory()->count(10)->create();

        
        foreach ($ingredients as $ingredient) {
        
            $translatedTitle = self::translateToCroatian($ingredient->title);
            $translatedSlug = self::translateToCroatian($ingredient->slug);

            $translatedTitleSpanish = self::translateToSpanish($ingredient->title);
            $translatedSlugSpanish = self::translateToSpanish($ingredient->slug);

            IngredientLanguage::create([
                'title' => $translatedTitle,
                'slug' => $translatedSlug,
            ]);

            IngredientLanguageSpanish::create([
                'title' => $translatedTitleSpanish,
                'slug' => $translatedSlugSpanish,
            ]);
        }
        $tags = Tag::factory()->count(10)->create();

        
        foreach ($tags as $tag) {
        
            $translatedTitle = self::translateToCroatian($tag->title);
            $translatedSlug = self::translateToCroatian($tag->slug);

            $translatedTitleSpanish = self::translateToSpanish($tag->title);
            $translatedSlugSpanish = self::translateToSpanish($tag->slug);

            TagLanguage::create([
                'title' => $translatedTitle,
                'slug' => $translatedSlug,
            ]);

            TagLanguageSpanish::create([
                'title' => $translatedTitleSpanish,
                'slug' => $translatedSlugSpanish,
            ]);
        }

    }
    private function translateToCroatian($text)
    {
        $translate = new GoogleTranslate('hr');  
        return $translate->translate($text);
    }

    private function translateToSpanish($text)
    {
        $translate = new GoogleTranslate('es');  
        return $translate->translate($text);
    }
    
}

