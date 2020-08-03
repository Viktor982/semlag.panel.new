<?php

namespace NPDashboard\Models\Translation;

use NPDashboard\Models\Model;

class Key extends Model
{
    protected $connection = 'bd_translations';
    protected $table = 'keys';
    public $timestamps = false;
}