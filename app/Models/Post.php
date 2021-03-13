<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content'
    ];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'posts_tags');
    }

    public function getTagListAttribute()
    {
        $tags = $this->tags()->pluck('name')->all();
        return implode(', ', $tags);
    }

    public function getCreatedAtFormatAttribute()
    {
        return $this->created_at->format('d/m/y');
    }
}
