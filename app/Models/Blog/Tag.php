<?php


namespace NPDashboard\Models\Blog;

use NPDashboard\Models\Model;

class Tag extends Model
{
    protected $table = 'blog_tags';
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(PostTags::class,'tag_id');
    }


}