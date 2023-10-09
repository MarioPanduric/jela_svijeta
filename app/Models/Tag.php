<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $connection = 'mysql_meals';
    protected $table = 'tags';
    protected $fillable = ['title', 'slug'];

}
