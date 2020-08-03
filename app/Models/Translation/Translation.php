<?php

namespace NPDashboard\Models\Translation;

use NPDashboard\Models\Model;

class Translation extends Model
{
    protected $connection = 'bd_translations';
    protected $table = 'translations';
    public $timestamps = false;
}