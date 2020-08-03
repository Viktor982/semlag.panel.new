<?php

namespace NPDashboard\Models;

class NPFaq extends Model
{
    protected $table = "npfaqs";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'lang', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function brotherFaqs()
    {
        return $this->hasMany(NPFaq::class,'multiple_question_id', 'multiple_question_id');
    }
}