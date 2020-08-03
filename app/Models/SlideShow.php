<?php

namespace NPDashboard\Models;

class SlideShow extends Model
{
    protected $table = "slideshow";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}