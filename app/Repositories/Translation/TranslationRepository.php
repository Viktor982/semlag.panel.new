<?php

namespace NPDashboard\Repositories\Translation;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Translation\Translation;

class TranslationRepository extends Repository
{
    public function getModel()
    {
        return (new Translation());
    }

   public function getTranslationByKey($keyname)
   {
       return $this->getModel()
                        ->join('keys', 'keys.key_id', '=', 'translations.key_id')
                        ->where('keys.key', $keyname)->first();
   }

   public function insertNewTranslation($arrTranslations, $key_id)
   {
       foreach($arrTranslations as $key => $translation)
       {
           if($key == 'pt')
               $language_id = 2;
           else if($key == 'es')
               $language_id = 4;
           else if($key == 'eu')
               $language_id = 1;
           else if($key == 'vn')
               $language_id = 6;
            $this->getModel()->create([
                'language_id' => $language_id,
                'key_id' => $key_id,
                'translation' => $translation,
                'contributor_id' => 1
            ]);
       }
       
   }
}