<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function author() {
        return $this->belongsTo('App\User','author_id', 'id');
    }
}
