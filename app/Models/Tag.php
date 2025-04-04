<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
    ];

    /**
     * A tag can belong to many posts.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    }
}
