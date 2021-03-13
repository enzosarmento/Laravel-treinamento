<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'comment',
        'name',
        'email'
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
