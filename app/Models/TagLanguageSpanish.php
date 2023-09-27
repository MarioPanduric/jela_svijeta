<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagLanguageSpanish extends Model
{
    use HasFactory;
    protected $connection = 'mysql_tags';
    protected $table = 'tags_esp';
    protected $fillable = ['title', 'slug'];
}
