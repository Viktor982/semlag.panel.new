<?php

namespace NPDashboard\Models\Blog;

use NPDashboard\Models\Model;
use NPDashboard\Models\Customer;
use NpDashboard\Models\Blog\Post;

class Comment extends Model
{
    protected $table = 'blog_post_comments';

    public $timestamps = true;

    public function author()
    {
        return $this->belongsTo(Customer::class, 'usuario_id');
    }

    public function post()
    {
    	return $this->belongsTo(Post::class, 'post_id');
    }
}