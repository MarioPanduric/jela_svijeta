<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealLanguageSpanish extends Model
{
    use HasFactory;
    protected $connection = 'mysql_meals';
    protected $table = 'meals_esp';
    protected $fillable = [ 'title', 'description', 'status', 'ingredients', 'categories', 'tags'];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}
