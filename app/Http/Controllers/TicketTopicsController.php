<?php


namespace NPDashboard\Http\Controllers;


use NPDashboard\Repositories\LanguageRepository;
use NPDashboard\Repositories\TicketCategoriesRepository;
use NPDashboard\Repositories\TicketTopicsRepository;

class TicketTopicsController extends Controller
{
    /***
     * @param TicketTopicsRepository $repository
     * @param TicketCategoriesRepository $categoriesRepository
     * @return mixed
     */
    public function all(TicketTopicsRepository $repository, TicketCategoriesRepository $categoriesRepository)
    {
        $topics = $repository->topicsTable();
        $categories = $categoriesRepository->findAll()->where('active', true);
        return view('pages.tickets.topics.all')
            ->withTopics($topics)
            ->withCategories($categories);
    }

    /**
     * @param TicketTopicsRepository $repository
     * @param LanguageRepository $languageRepository
     * @return array
     */
    public function store(TicketTopicsRepository $repository, LanguageRepository $languageRepository)
    {
        $args = $this->request->all();
        $topic = $repository->create([
            'category_id' => $args['category_id'],
            'active' => $args['active'],
            'tag' => $args['tag']
        ]);

        $values = [
            'br' => [
                'name' => $args['name_br'],
                'template' => $args['template_br']
            ],
            'en' => [
                'name' => $args['name_en'],
                'template' => $args['template_en']
            ],
            'es' => [
                'name' => $args['name_es'],
                'template' => $args['template_es']
            ]
        ];

        foreach ($values as $key => $value){
            $lang = $languageRepository->findByShort($key);
            $topic->translations()->create([
                'language_id' => $lang['id'],
                'name' => $value['name'],
                'template' => $value['template']
            ]);
        }

        return [
            'success' => true
        ];
    }

    /**
     * @param TicketTopicsRepository $repository
     * @param LanguageRepository $languageRepository
     * @return array
     */
    public function update(TicketTopicsRepository $repository, LanguageRepository $languageRepository)
    {
        $args = $this->request->all();
        $topic = $repository->find($args['id']);
        $topic->update([
            'category_id' => $args['category_id'],
            'active' => $args['active'],
            'tag' => $args['tag']
        ]);

        $items = [
            'br' => [
                'name' => $args['br_name'],
                'template' => $args['br_template']
            ],
            'en' => [
                'name' => $args['en_name'],
                'template' => $args['en_template']
            ],
            'es' => [
                'name' => $args['es_name'],
                'template' => $args['es_template']
            ]
        ];

        foreach($items as $key => $value){
            $lang = $languageRepository->findByShort($key);
            $topic->translations()
                ->where('language_id', $lang['id'])
                ->update([
                    'name' => $value['name'],
                    'template' => $value['template']
                ]);
        }

        return [
            'success' => true
        ];
    }
}