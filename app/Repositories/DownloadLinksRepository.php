<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\DownloadLink;

class DownloadLinksRepository extends Repository
{
    /**
     * @return DownloadLink
     */

    public function getModel()
    {
        return (new DownloadLink());
    }

    /**
     * @return mixed
     */
    public function downloadsTable()
    {
        return $this->getModel()
            ->select('id', 'version_name', 'link', 'state')
            ->paginate(10);
    }

    /**
     * @param array $options
     * @return mixed
     */
    public function create(array $options)
    {
        $link = $this->getModel()->create([
            'version_name' => $options['version_name'],
            'link' => $options['link'],
            'state' => $options['state']
        ]);
        collect([
            'en' => $options['en'],
            'es' => $options['es'],
            'br' => $options['br'],
        ])->each(function ($lang, $key) use ($link) {
            $link->names()->updateOrCreate(['lang' => $key], ['name' => $lang]);
        });
        return $link;
    }

    /**
     * @param array $options
     * @param $id
     * @return Model
     */
    public function update(array $options, $id)
    {
        $link = $this->getModel()->find($id);
        $link->update([
            'version_name' => $options['version_name'],
            'link' => $options['link'],
            'state' => $options['state']
        ]);
        collect(['en' => $options['en'], 'es' => $options['es'], 'br' => $options['br']])->each(function ($lang, $key) use ($link) {
            $link->names()->updateOrCreate(['lang' => $key], ['name' => $lang]);
        });
        return $link;
    }
}