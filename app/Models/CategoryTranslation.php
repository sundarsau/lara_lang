<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','language_code','name', 'descr'];

    public function catagory(){
        return $this->belongsTo(Category::class);
    }
}
