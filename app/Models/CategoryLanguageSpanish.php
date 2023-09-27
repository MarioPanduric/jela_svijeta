<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLanguageSpanish extends Model
{
    use HasFactory;

    protected $connection = 'mysql_categories';

    protected $table = 'categories_esp';

    protected $fillable = ['title', 'slug'];
}
