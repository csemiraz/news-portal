<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function rSubCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id')->withDefault([
            'subcategory_name' => 'No category'
        ]);
    }

    /* public function rTags()
    {
        return $this->hasMany(Tag::class);
    } */
}
