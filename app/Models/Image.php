<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class Image extends Model
{
    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        return 'https://nptunnel.com/npimg/'.$this->slug;
    }

    /**
     * @return mixed
     */
    public function getUrlCleanAttribute()
    {
        return $this->slug;
    }
}