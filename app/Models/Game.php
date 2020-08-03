<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class Game extends Model
{
    protected $table = 'games';
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields()
    {
        return $this->hasMany(GameField::class, 'g_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publish()
    {
        return $this->hasMany(GamePublish::class,'g_id','id')->orderBy('id', 'asc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirements()
    {
        return $this->hasMany(GameRequirement::class,'g_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sections()
    {
        return $this->hasMany(GameSection::class, 'g_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tags()
    {
        return $this->hasOne(GameTag::class, 'g_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testimonialCovers()
    {
        return $this->hasMany(TestimonialCover::class,'game_id', 'id');
    }
}