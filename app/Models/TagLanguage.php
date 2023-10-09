<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagLanguage extends Model
{
    use HasFactory;
    protected $connection = 'mysql_meals';
    protected $table = 'tags_cro';
    protected $fillable = ['title', 'slug'];
}
