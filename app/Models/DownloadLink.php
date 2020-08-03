<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class DownloadLink extends Model
{
    protected $table = 'download_links';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function names()
    {
        return $this->hasMany(DownloadLinkName::class, 'link_id', 'id');
    }
}