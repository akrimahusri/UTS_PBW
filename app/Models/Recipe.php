<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'ingredients',
        'instructions',
        'category',
        'image_path',
    ];    
}
