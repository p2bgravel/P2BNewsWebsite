<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'author_id ', 'state', 'slug', 'tags', 'image_url', 'html_meta', 'published_at'];
    // do not show the pivot table
    protected $hidden = ['pivot'];

    public function isTheAuthor($loginId)
    {
        return $this->author_id === $loginId;
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Api\Category', 'article_category', 'article_id', 'category_id');
    }

    //scope
    public function scopeSearchKeyword($query, $keyword)
    {
        if (!$keyword) return $query;

        $pattern = '%' . $keyword . '%';
        return $query->where('title', 'LIKE', $pattern)->orWhere('content', 'LIKE', $pattern);
    }

    public function scopeGetByAuthor($query, $author_id)
    {
        if ($author_id) {
            return $query->where('author_id', $author_id);
        }
        return $query;
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

    public function scopeGetByArticleState($query, $state)
    {
        switch ($state) {
            case "draft" :
                {
                    return $query->where("state", "draft");
                }
            case "published" :
                {
                    return $query->where("state", "published");
                }
            case "deleted" :
                {
                    return $query->where("state", "deleted");
                }
            default :
                {
                    return $query;
                }
        }

    }
}
