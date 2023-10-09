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

use App\Http\Resources\MealsResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MealController extends Controller
{
    function makeQuery($mealsQuery, $tags, $categories, $diffTime)
    {
        if ($tags) {
            $tagNumbers = explode(',', $tags);
            foreach ($tagNumbers as $tagNumber) {
                $mealsQuery->whereJsonContains('tags', (int)$tagNumber);
                
            }
        }

        if($categories){
            $mealsQuery -> where('category', $categories);
        }

        $mealsQuery->where('created_at','>=', $diffTime );
        return $mealsQuery;
    }

    function validateRequest(Request $request) {
        $validator = Validator::make($request->all(), [
            'diff_time' => 'required|digits:14',
            'lang' => ['required', Rule::in(['hr', 'en', 'es'])]
        ]);
    
        return $validator;
    }

    function getLanguageQuery($lang){
        if($lang=='en'){
            $query = Meal::query();      
        }
        elseif($lang=='hr') {
            $query = MealLanguage::query();
        }
        elseif($lang == 'es') {
            $query = MealLanguageSpanish::query();
        }
        return $query;
    }

    public function index(Request $request)
    {
        $validator = self::validateRequest($request);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }
        else{
            $perPage = $request->input('per_page');
            $tags = $request->input('tags', null);
            $categories = $request->input('category', null);
            $lang = $request->input('lang');
            $diffTime = $request->input('diff_time');
            $page = $request->input('page');

            $query = self::getLanguageQuery($lang);
            $mealsQuery = self::makeQuery($query, $tags, $categories, $diffTime);
            $meals = $mealsQuery->paginate($perPage, ['*'], 'page', $page);

            return response()->json(MealsResource::mapData($request, $meals));
            
        }
    }

}
