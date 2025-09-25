<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    'name',
    'url',
    'description',
    'visibility',
    'show_in_menu',
    'seo_keyword',
    'seo_title',
    'seo_description',
    'parent_category_id' 
    ];
}
