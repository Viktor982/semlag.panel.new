<?php

namespace NPDashboard\Repositories\Translation;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Translation\VersionPatchNotes;

class VersionPatchNotesRepository extends Repository
{
    public function getModel()
    {
        return (new VersionPatchNotes());
    }

    public function getCurrentVersion()
    {
        return $this->getModel()->first();
    }

    public function updateCurrentVersion($version)
    {
        return $this->getModel()->where('active', 1)->update(['version' => $version]);
    }
}