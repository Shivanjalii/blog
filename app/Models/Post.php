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
        'post_type',   
        'meta_data',   
        'category_id', 
        'user_id',     
    ];

    protected $casts = [
        'meta_data' => 'array', 
    ];

    /**
     * Each post belongs to one category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
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
