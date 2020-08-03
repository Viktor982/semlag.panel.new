<?php

namespace NPDashboard\Http\Controllers;

use NPDashboard\Http\ACL\UserCreateSupportedGameRoleValidation;
use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Models\Game;
use NPDashboard\Repositories\GamesRepository;
use NPDashboard\Repositories\LanguageRepository;
use NPDashboard\Services\ImagesService;

class GamesController extends Controller
{
    /**
     * @param GamesRepository $repository
     * @return \Illuminate\Contracts\View\View
     */
    public function all(GamesRepository $repository)
    {
        $games = $repository->gamesTable();
        return view('pages.games.all', ['games' => $games]);
    }

    /**
     * @param UserCreateSupportedGameRoleValidation $role
     * @param LanguageRepository $repository
     * @return \Illuminate\Contracts\View\View
     */
    public function create(UserCreateSupportedGameRoleValidation $role, LanguageRepository $repository)
    {
        $langs = $repository->getModel();
        return view('pages.games.create', ['langs' => $langs]);
    }

    /**
     * @param GamesRepository $repository
     * @param ImagesService $imagesService
     * @param UserCreateSupportedGameRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function store(GamesRepository $repository, ImagesService $imagesService, UserCreateSupportedGameRoleValidation $role)
    {
        $args = $this->request->all();
        $files = $this->request->files()->toArray();
        $cover = $imagesService->create($files['cover']);
        $logo = $imagesService->create($files['logo']);
        $request = $this->request->inputs()->toArray();

        $game = $repository->create([
            'name' => $request['name'],
            'slug' => str_slug($request['name'], '-'),
            'image' => str_replace('https://nptunnel.com/npimg/', '', $cover),
            'cover' => str_replace('https://nptunnel.com/npimg/', '', $logo),
            'testimonial' => 1,
            'fixed_cover' => $request['fixed_cover'],
            'page_access' => $request['page_access']
        ]);

        foreach ($files['capa'] as $image) {
            $testimonialCover = $imagesService->create($image);
            $game->testimonialCovers()->create([
                'game_id' => $game->id,
                'file' => str_replace('https://nptunnel.com/npimg/', '', $testimonialCover)
            ]);
        }

        for ($i = 0; $i < count($args['gfield_title']); $i++) {
            $game->publish()->create([
                'g_id' => $game->id,
                'title' => $args['gfield_title'][$i],
                'body' => $args['gfield_body'][$i],
                'lang' => $args['gfield_lang'][$i]
            ]);
        }

        if (isset($args['checkbox_requirements']) || $args['checkbox_requirements'] == 1) {
            $requirements = $this->request->only(['cpu', 'gpu', 'ram', 'disk_space', 'resolution', 'operational_system']);
            foreach ($requirements as $key => $value) {
                $game->requirements()->create([
                    'g_id' => $game->id,
                    'title' => $key,
                    'value' => $value
                ]);
            }
        }

        if (isset($args['checkbox_fields']) || $args['checkbox_fields'] == 1) {
            $fields = $this->request->only(['genre', 'date', 'servers', 'site']);
            foreach ($fields as $key => $value) {
                $game->fields()->create([
                    'g_id' => $game->id,
                    'key' => $key,
                    'value' => $value
                ]);
            }
        }

        if (isset($args['checkbox_section']) || $args['checkbox_section'] == 1) {
            $section = collect([
                'title' => $args['gsection_title'],
                'body' => $args['gsection_body'],
                'order' => $args['gsection_order'],
                'lang' => $args['gsection_lang']
            ]);
            for ($i = 0; $i < count($section['title']); $i++) {
                $game->sections()->create([
                    'g_id' => $game->id,
                    'title' => $section['title'][$i],
                    'body' => $section['body'][$i],
                    'order' => $section['order'][$i],
                    'lang' => $section['lang'][$i]
                ]);
            }
        }

        $game->tags()->create([
            'g_id' => $game->id,
            'tags' => $args['gtags']
        ]);

        np_log('store', [
            'type' => "Game",
            'id' => $game->id
        ]);

        return redirect('games.all');
    }

    /**
     * @param GamesRepository $repository
     * @param LanguageRepository $languageRepository
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(GamesRepository $repository, LanguageRepository $languageRepository)
    {
        $id = $this->request->all();
        $game = $repository->find($id);
        $langs = $languageRepository->getModel();
        return view('pages.games.edit', [
            'game' => $game,
            'langs' => $langs,
            ]);
    }

    /**
     * @param GamesRepository $repository
     * @param ImagesService $imagesService
     * @return \NPCore\Http\Redirect
     */
    public function update(GamesRepository $repository, ImagesService $imagesService)
    {
        $files = $this->request->files()->toArray();
        $args = $this->request->except(['update-cover', 'update-logo']);
        $game = $repository->find($args['id']);

        if ($this->request->all()['update-cover'] && $this->request->all()['update-logo']) {
            $cover = $imagesService->create($files['cover']);
            $logo = $imagesService->create($files['logo']);
            $game->update([
                'name' => $args['name'],
                'slug' => str_slug($args['name'], '-'),
                'image' => str_replace('https://nptunnel.com/npimg/', '', $logo),
                'cover' => str_replace('https://nptunnel.com/npimg/', '', $cover),
                'fixed_cover' => $args['fixed_cover'],
                'page_access' => $args['page_access']
            ]);
        } elseif ($this->request->all()['update-logo']) {
            $logo = $imagesService->create($files['logo']);
            $game->update([
                'name' => $args['name'],
                'slug' => str_slug($args['name'], '-'),
                'image' => str_replace('https://nptunnel.com/npimg/', '', $logo),
                'fixed_cover' => $args['fixed_cover'],
                'page_access' => $args['page_access']
            ]);
        } elseif ($this->request->all()['update-cover']) {
            $cover = $imagesService->create($files['cover']);
            $game->update([
                'name' => $args['name'],
                'slug' => str_slug($args['name'], '-'),
                'cover' => str_replace('https://nptunnel.com/npimg/', '', $cover),
                'fixed_cover' => $args['fixed_cover'],
                'page_access' => $args['page_access']
            ]);
        } else {
            $game->update([
                'name' => $args['name'],
                'slug' => str_slug($args['name'], '-'),
                'fixed_cover' => $args['fixed_cover'],
                'page_access' => $args['page_access']
            ]);
        }

        /*Add New Covers */
        if ($args['add_new_cover']) {
            foreach ($files['capa'] as $image) {
                $testimonialCover = $imagesService->create($image);
                $game->testimonialCovers()->create([
                    'game_id' => $game->id,
                    'file' => $testimonialCover
                ]);
            }
        }
        /*Publish Update */
        if ($game->publish->isEmpty()) {
            $game->publish()->create([
                'g_id' => $game->id,
                'title' => $args['gfield_title'],
                'body' => $args['gfield_body']
            ]);
        } else {
            array_filter($publish = collect([
                'id' => $args['gfield_id'],
                'title' => $args['gfield_title'],
                'body' => $args['gfield_body'],
                'lang' => $args['gfield_lang']
            ])->toArray());
            for ($i = 0; $i < count($publish['title']); $i++) {
                $game->publish()->where('id',$publish['id'][$i])->update([
                    'title' => $publish['title'][$i],
                    'body' => $publish['body'][$i],
                    'lang' => $publish['lang'][$i]
                ]);
            }
        }
        /*Requirements Updates */
        if ($args['checkbox_requirements'] == 1) {
            $requirements = $this->request->only(['cpu', 'gpu', 'ram', 'disk_space', 'resolution', 'operational_system']);
            if ($game->requirements->isEmpty()) {
                foreach ($requirements as $key => $value) {
                    $game->requirements()->create([
                        'g_id' => $game->id,
                        'title' => $key,
                        'value' => $value
                    ]);
                }
            } else {
                $game->requirements()->delete();
                foreach ($requirements as $key => $value) {
                    $game->requirements()->create([
                        'g_id' => $game->id,
                        'title' => $key,
                        'value' => $value
                    ]);
                }
            }
        }else {
            $game->requirements()->delete();
        }
        /*Fields Updates */
        if ($args['checkbox_fields'] == 1) {
            $fields = $this->request->only(['genre', 'date', 'servers', 'site']);
            if ($game->fields->isEmpty()) {
                foreach ($fields as $key => $value) {
                    $game->fields()->create([
                        'g_id' => $game->id,
                        'key' => $key,
                        'value' => $value
                    ]);
                }
            } else {
                $game->fields()->delete();
                foreach ($fields as $key => $value) {
                    $game->fields()->create([
                        'g_id' => $game->id,
                        'key' => $key,
                        'value' => $value
                    ]);
                }
            }
        }else {
            $game->fields()->delete();
        }

        $game->tags()->where('g_id', $game->id)->update([
            'tags' => $args['gtags']
        ]);

        np_log('edit', [
            'type' => "Game",
            'id' => $game->id
        ]);
        return redirect('games.all');
    }

    /**
     * @param GamesRepository $repository
     * @return \NPCore\Http\Redirect
     */
    public function updateCoverStatus(GamesRepository $repository)
    {
        $id = $this->request->all()['id'];
        $game = $repository->find($id);
        ($game->fixed_cover) ? $game->update(['fixed_cover' => 0]) : $game->update(['fixed_cover' => 1]);
        return redirect('games.all');
    }

    /**
     * @param GamesRepository $repository
     * @return \NPCore\Http\Redirect
     */
    public function updatePageAccessStatus(GamesRepository $repository)
    {
        $id = $this->request->all()['id'];
        $game = $repository->find($id);
        ($game->page_access) ? $game->update(['page_access' => 0]) : $game->update(['page_access' => 1]);
        return redirect('games.all');
    }


    /**
     * @param GamesRepository $repository
     * @return mixed
     */
    public function deleteCover(GamesRepository $repository)
    {
        $args = $this->request->all();
        $game = $repository->find($args['id']);
        $cover = $game->testimonialCovers()->where('id', $args['id_cover']);
        $cover->delete();

        return $cover;
    }
}