<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // do not show the pivot table
    protected $hidden = ['pivot'];

    public function author() {
        return $this->belongsTo('App\User','author_id', 'id');
    }
    public function categories() {
        return $this->belongsToMany('App\Models\Api\Category','article_category','article_id', 'category_id');
    }
}
