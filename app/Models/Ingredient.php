<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    
    protected $table = 'ingredients';
    protected $fillable = ['title', 'slug'];
    protected $connection = 'mysql_meals';

    public function translations()
    {
        return $this->hasMany(IngredientLanguage::class, 'ingredient_id');
    }
}