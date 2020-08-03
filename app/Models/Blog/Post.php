<?php

namespace NPDashboard\Models\Blog;

use NPDashboard\Models\Model;
use NPDashboard\Models\Blog\Tag;
use NPDashboard\Models\Blog\Category;
use NPDashboard\Models\User;

class Post extends Model
{
    protected $table = 'blog_posts';
    public $timestamps = true;
    protected $dates = ['publication_date'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_post_tags')
            ->select(['blog_tags.id', 'blog_tags.name']);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_post_categories')
            ->select(['blog_categories.id', 'blog_categories.name']);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

}