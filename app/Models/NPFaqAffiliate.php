<?php

namespace NPDashboard\Models;

class NPFaqAffiliate extends Model
{
    protected $table = "npfaqs_affiliates";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'lang', 'id');
    }

}