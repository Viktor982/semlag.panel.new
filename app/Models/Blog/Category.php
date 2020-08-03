<?php


namespace NPDashboard\Models\Blog;

use NPDashboard\Models\Model;

class Category extends Model
{
    protected $table = 'blog_categories';
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(PostCategories::class,'category_id');
    }

}