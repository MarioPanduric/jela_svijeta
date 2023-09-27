<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLanguage extends Model
{
    
    use HasFactory;

    protected $connection = 'mysql_categories';

    protected $table = 'categories_cro';

    protected $fillable = ['title', 'slug'];
}