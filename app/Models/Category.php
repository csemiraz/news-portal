<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function rSubCategory()
    {
        return $this->hasMany(SubCategory::class)->where('subcategory_status', 'Show')->orderBy('subcategory_order', 'asc');
    }
}
