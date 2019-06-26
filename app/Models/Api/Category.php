<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // do not show the pivot table
    protected $hidden = ['pivot'];

    protected $fillable = ['name', 'display_name'];

    public function articles()
    {
        return $this->belongsToMany('App\Models\Api\Article', 'article_category', 'category_id', 'article_id');
    }
}
