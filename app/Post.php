<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public static function generateSlug($title)
    {
        $slug = Str::slug($title, '-');
        $slug_base = $slug;

        $post_present = Post::where('slug', $slug)->first();
        $c = 1;

        while ($post_present) {
            $slug = $slug_base . '-' . $c;
            $c++;
            $post_present = Post::where('slug', $slug)->first();
        }

        return $slug;
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id',
        'tag_id'
    ];
}
