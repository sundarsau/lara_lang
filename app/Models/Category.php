<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
   
    public function cat_translation(){
        return $this->hasMany(CategoryTranslation::class, 'category_id', 'id');
    }
}
