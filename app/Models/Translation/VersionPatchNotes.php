<?php

namespace NPDashboard\Models\Translation;

use NPDashboard\Models\Model;

class VersionPatchNotes extends Model
{
    protected $connection = 'bd_translations';
    protected $table = 'version';
    public $timestamps = false;
}