<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class MealController extends Controller
{
    function extractData($data)
    {
        $parts = explode(',', $data);
        $extractedData = [];

        foreach ($parts as $part) {
            $pair = explode('=', $part);

            if (count($pair) === 2) {
                $key = trim($pair[0]);
                $value = (int)trim($pair[1]);
                $extractedData[$key] = $value;
            }
        }

        return $extractedData;
    }
    public function index(Request $request)
    {
        $perPage = $request->input('per_page');
        $tags = $request->input('tags', null);
        $categories = $request->input('category', null);
        $lang = $request->input('lang');
        $with = $request->input('with', []);
        $diffTime = $request->input('diff_time');
        $page = $request->input('page');

        if($lang=='en'){
            $mealsQuery = Meal::query();

            if ($tags) {
                $mealsQuery->where('tags', $tags)
                        ->where('created_at',$diffTime );
            }

            if (!empty($with)) {
                $extractedData = self::extractData($with);
                foreach ($extractedData as $key => $value) {
                    $mealsQuery->where($key, $value)
                    ->where('created_at',$diffTime );
                }
            }

            $mealsQuery->where('created_at',$diffTime );

            $meals = $mealsQuery->paginate($perPage, ['*'], 'page', $page);

            $transformedMeals = $meals->map(function ($meal) {
                $tag_id = $meal->tags;
                $category_id = $meal->category;
                $ingredients_id = $meal->ingredients;

                $tag = Tag::find($tag_id);

                $category = Category::find($category_id);

                $ingredients = Ingredient::find($ingredients_id);
                return [
                    'id' => $meal->id,
                    'title' => $meal->title,
                    'description' => $meal->description,
                    'status' => $meal->status,
                    'category' => $category ? [
                        'id' => $category->id,
                        'title' => $category->title,
                        'slug' => $category->slug,
                    ] : null,
                    'tags' => $tag ? [
                        'id' => $tag->id,
                        'title' => $tag->title,
                        'slug' => $tag->slug,
                    ] : null,
                    'ingredients' => $ingredients ? [
                        'id' => $ingredients->id,
                        'title' => $ingredients->title,
                        'slug' => $ingredients->slug,
                    ] : null,
                ];
            });

            return response()->json([
                'meta' => [
                    'currentPage' => $meals->currentPage(),
                    'totalItems' => $meals->total(),
                    'itemsPerPage' => $meals->perPage(),
                    'totalPages' => $meals->lastPage(),
                ],
                'data' => $transformedMeals,
                'links' => [
                    'prev' => $meals->previousPageUrl(),
                    'next' => $meals->nextPageUrl(),
                    'self' => $meals->url($meals->currentPage()),
                ],
            ]);
            }
        elseif($lang=='hr') {
            $mealsQuery = MealLanguage::query();

            if ($tags) {
                $mealsQuery->where('tags', $tags)
                        ->where('created_at',$diffTime );
            }

            if (!empty($with)) {
                $extractedData = self::extractData($with);
                foreach ($extractedData as $key => $value) {
                    $mealsQuery->where($key, $value)
                    ->where('created_at',$diffTime );
                }
            }

            $mealsQuery->where('created_at',$diffTime );

            $meals = $mealsQuery->paginate($perPage, ['*'], 'page', $page);

            $transformedMeals = $meals->map(function ($meal) {
                $tag_id = $meal->tags;
                $category_id = $meal->category;
                $ingredients_id = $meal->ingredients;

                $tag = TagLanguage::find($tag_id);

                $category = CategoryLanguage::find($category_id);

                $ingredients = IngredientLanguage::find($ingredients_id);
                return [
                    'id' => $meal->id,
                    'title' => $meal->title,
                    'description' => $meal->description,
                    'status' => $meal->status,
                    'category' => $category ? [
                        'id' => $category->id,
                        'title' => $category->title,
                        'slug' => $category->slug,
                    ] : null,
                    'tags' => $tag ? [
                        'id' => $tag->id,
                        'title' => $tag->title,
                        'slug' => $tag->slug,
                    ] : null,
                    'ingredients' => $ingredients ? [
                        'id' => $ingredients->id,
                        'title' => $ingredients->title,
                        'slug' => $ingredients->slug,
                    ] : null,
                ];
            });

            return response()->json([
                'meta' => [
                    'currentPage' => $meals->currentPage(),
                    'totalItems' => $meals->total(),
                    'itemsPerPage' => $meals->perPage(),
                    'totalPages' => $meals->lastPage(),
                ],
                'data' => $transformedMeals,
                'links' => [
                    'prev' => $meals->previousPageUrl(),
                    'next' => $meals->nextPageUrl(),
                    'self' => $meals->url($meals->currentPage()),
                ],
            ]);
        }
        else {
            $mealsQuery = MealLanguageSpanish::query();

            if ($tags) {
                $mealsQuery->where('tags', $tags)
                        ->where('created_at',$diffTime );
            }

            if (!empty($with)) {
                $extractedData = self::extractData($with);
                foreach ($extractedData as $key => $value) {
                    $mealsQuery->where($key, $value)
                    ->where('created_at',$diffTime );
                }
            }

            $mealsQuery->where('created_at',$diffTime );

            $meals = $mealsQuery->paginate($perPage, ['*'], 'page', $page);

            $transformedMeals = $meals->map(function ($meal) {
                $tag_id = $meal->tags;
                $category_id = $meal->category;
                $ingredients_id = $meal->ingredients;

                $tag = TagLanguageSpanish::find($tag_id);

                $category = CategoryLanguageSpanish::find($category_id);

                $ingredients = IngredientLanguageSpanish::find($ingredients_id);
                return [
                    'id' => $meal->id,
                    'title' => $meal->title,
                    'description' => $meal->description,
                    'status' => $meal->status,
                    'category' => $category ? [
                        'id' => $category->id,
                        'title' => $category->title,
                        'slug' => $category->slug,
                    ] : null,
                    'tags' => $tag ? [
                        'id' => $tag->id,
                        'title' => $tag->title,
                        'slug' => $tag->slug,
                    ] : null,
                    'ingredients' => $ingredients ? [
                        'id' => $ingredients->id,
                        'title' => $ingredients->title,
                        'slug' => $ingredients->slug,
                    ] : null,
                ];
            });

            return response()->json([
                'meta' => [
                    'currentPage' => $meals->currentPage(),
                    'totalItems' => $meals->total(),
                    'itemsPerPage' => $meals->perPage(),
                    'totalPages' => $meals->lastPage(),
                ],
                'data' => $transformedMeals,
                'links' => [
                    'prev' => $meals->previousPageUrl(),
                    'next' => $meals->nextPageUrl(),
                    'self' => $meals->url($meals->currentPage()),
                ],
            ]);
        }
    }

}
