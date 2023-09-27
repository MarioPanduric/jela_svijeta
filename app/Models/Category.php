<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model 
{
    use HasFactory;

    protected $connection = 'mysql_categories';
    protected $fillable = ['title', 'slug'];

    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'meal_categories');
    }

    
}
