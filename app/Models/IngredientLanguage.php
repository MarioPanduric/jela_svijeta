<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientLanguage extends Model
{
    use HasFactory;
    protected $table = 'ingredient_cro';
    protected $fillable = ['title', 'slug'];
    protected $connection = 'mysql_meals';
    
}