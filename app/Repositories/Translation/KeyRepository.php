<?php

namespace NPDashboard\Repositories\Translation;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Translation\Key;

class KeyRepository extends Repository
{
    public function getModel()
    {
        return (new Key());
    }

   public function insertNewKey($keyname)
   {
      return $this->getModel()->create(['key' => $keyname])->id;
   }
}