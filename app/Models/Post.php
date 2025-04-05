<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',       
        'content',
        'slug',        
        'user_id',     
    ];

    /**
     * Each post belongs to many category.
     */
    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_post', 'post_id', 'category_id');
    }

    /**
     * A post can belong to many tags.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    /**
     * Each post belongs to a user (author).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
