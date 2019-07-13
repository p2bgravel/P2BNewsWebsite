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

    //scope
    public function scopeSearchKeyword($query, $keyword)
    {
        if (!$keyword) return $query;

        $pattern = '%' . $keyword . '%';
        return $query->where('name', 'LIKE', $pattern)->orWhere('display_name', 'LIKE', $pattern);
    }

    /**
     * get the resource order by asc | desc by field
     * @param $query
     * @param $input as array = [$field, "asc|desc"]
     * @return $query
     */
    public function scopeGetOrderBy($query, $input)
    {
        $field = $input[0];
        $order = $input[1];
        if (!$input || !$order || ($order !== 'asc' && $order !== 'desc')) return $query;

        return $query->orderBy($field, $order);
    }
    
}
