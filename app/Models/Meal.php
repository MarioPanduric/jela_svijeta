<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Meal extends Model
{
    use HasFactory;
    use SoftDeletes, FilterQueryString;
  
    protected $connection = 'mysql_meals';
    protected $filters = ['id', 'title', 'description'];

    protected $fillable = [ 'title', 'description', 'status', 'ingredients', 'categories', 'tags'];
    public $translatedAttributes = ['title', 'description'];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public function translations()
    {
        return $this->hasMany(MealLanguage::class, 'meal_id');
    }
}

