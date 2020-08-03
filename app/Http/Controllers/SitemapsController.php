<?php


namespace NPDashboard\Http\Controllers;


use NPDashboard\Repositories\SitemapsRepository;

class SitemapsController extends Controller
{
    /**
     * @param SitemapsRepository $repository
     * @return \Illuminate\Contracts\View\View
     */
    public function all(SitemapsRepository $repository)
    {
        $siteMaps = $repository->all();
        return view('pages.sitemaps.all', ['sitemaps' => $siteMaps]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('pages.sitemaps.create');
    }

    /**
     * @param SitemapsRepository $repository
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(SitemapsRepository $repository)
    {
        $id = $this->request->all()['id'];
        $siteMap = $repository->find($id);
        return view('pages.sitemaps.edit', ['sitemap' => $siteMap]);
    }

    /**
     * @param SitemapsRepository $repository
     * @return \NPCore\Http\Redirect
     */
    public function store(SitemapsRepository $repository)
    {
        $args = $this->request->all();
        $repository->create($args);
        return redirect('site.sitemaps.all');
    }

    /**
     * @param SitemapsRepository $repository
     * @return \NPCore\Http\Redirect
     */
    public function update(SitemapsRepository $repository)
    {
        $args = $this->request->except(['id']);
        $id = $this->request->all()['id'];
        $siteMap = $repository->find($id);
        $siteMap->update($args);
        return redirect('site.sitemaps.all');
    }

    /**
     * @param SitemapsRepository $repository
     * @return \NPCore\Http\Redirect
     */
    public function delete(SitemapsRepository $repository)
    {
        $id = $this->request->all();
        $repository->find($id)->delete();
        return redirect('site.sitemaps.all');
    }
}