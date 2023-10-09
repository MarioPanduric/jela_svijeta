<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Meal;
use App\Models\Ingredient;
use App\Models\Category;
use App\Models\Tag;

use App\Models\MealLanguage;
use App\Models\IngredientLanguage;
use App\Models\CategoryLanguage;
use App\Models\TagLanguage;

use App\Models\MealLanguageSpanish;
use App\Models\IngredientLanguageSpanish;
use App\Models\CategoryLanguageSpanish;
use App\Models\TagLanguageSpanish;
class MealsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static function mapTagsAndCategoryData($data){
        return [
            'id' => $data->id,
            'title' => $data->title,
            'slug' => $data->slug,
        ];

    }

    public static function getIngredientsData(Request $request, $ingredients_id){
        $ingredientsData = [];
        if($request->input('lang') == 'en'){
            foreach ($ingredients_id as $ingredient) {
                $ingredients = Ingredient::find($ingredient);
                $ingredientsData[] = self::mapTagsAndCategoryData($ingredients);
        
            } 
        }
        elseif($request->input('lang') == 'hr'){
            foreach ($ingredients_id as $ingredient) {
                $ingredients = IngredientLanguage::find($ingredient);
                $ingredientsData[] = self::mapTagsAndCategoryData($ingredients);
            
            }
        }
        else{
            foreach ($ingredients_id as $ingredient) {
                $ingredients = IngredientLanguageSpanish::find($ingredient);
                $ingredientsData[] = self::mapTagsAndCategoryData($ingredients);
            }
        }
        return $ingredientsData;
    }

    public static function getTagsData(Request $request, $tag_id){
        $tagsData = [];
        if($request->input('lang') == 'en'){
            foreach ($tag_id as $tag) {
                $tags = Tag::find($tag);
                $tagsData[] = self::mapTagsAndCategoryData($tags);
            }
        }
        elseif($request->input('lang') == 'hr'){
            foreach ($tag_id as $tag) {
                $tags = TagLanguage::find($tag);
                $tagsData[] = self::mapTagsAndCategoryData($tags);
            }
        }
        else{
            foreach ($tag_id as $tag) {
                $tags = TagLanguageSpanish::find($tag);
                $tagsData[] = self::mapTagsAndCategoryData($tags);
            }
        }
        return $tagsData;
    }

    public static function getCategory(Request $request, $category_id){
        if($request->input('lang') == 'en'){
            return Category::find($category_id);
        }
        elseif($request->input('lang') == 'hr') {
            return CategoryLanguage::find($category_id);
        }
        else {
            return CategoryLanguageSpanish::find($category_id);
        }
        
    }

    public static function mapMealData(Request $request, $meals)
    {
        
        $transformedMeals = $meals->map(function ($meal) use ($request) {
            $tag_id = json_decode($meal->tags, true);
            $category_id = $meal->category;
            $ingredients_id = json_decode($meal->ingredients, true);
            
            $category = self::getCategory($request, $category_id);
            $ingredientsData = self::getIngredientsData($request, $ingredients_id);
            $tagsData = self::getTagsData($request, $tag_id);

            $responseData = [
                'id' => $meal->id,
                'title' => $meal->title,
                'description' => $meal->description,
                'status' => $meal->status,
            ];
            $with = $request->input('with', []);
            if($with){
                $with_parameters = explode(',', $with);
                if(in_array('ingredients', $with_parameters)){
                    $responseData = array_merge($responseData, ['ingredients' => $ingredientsData]);
                };
                if(in_array('category', $with_parameters)){
                    $responseData = array_merge($responseData, ['category' => $category ? [
                        'id' => $category->id,
                        'title' => $category->title,
                        'slug' => $category->slug,
                    ] : null]);
                };
                if(in_array('tags', $with_parameters)){
                    $responseData = array_merge($responseData, ['tags' => $tagsData]);
                };
            }
            
            return $responseData;
        });

        return $transformedMeals;
    }

    public static function mapData(Request $request, $meals): array{
        return [
            'meta' => [
                'currentPage' => $meals->currentPage(),
                'totalItems' => $meals->total(),
                'itemsPerPage' => $meals->perPage(),
                'totalPages' => $meals->lastPage(),
            ],
            'data' =>self::mapMealData($request, $meals),
            'links' => [
                'prev' => $meals->previousPageUrl(),
                'next' => $meals->nextPageUrl(),
                'self' => $meals->url($meals->currentPage()),
            ],
        ];
    }
}
