<?php

namespace NPDashboard\Services;

use NPDashboard\Models\Blog\Post;
use NPDashboard\Models\Blog\Comment;
use NPDashboard\Repositories\Blog\CategoriesRepository;
use NPDashboard\Repositories\Blog\TagsRepository;
use NPDashboard\Repositories\Blog\PostRepository;
use NPDashboard\Services\ImagesService;
class BlogService
{
    /**
     * @var CategoriesRepository
     */
    private $categories;

    /**
     * @var TagsRepository
     */
    private $tags;

    /**
     * @var PostsRepository
     */
    private $posts;

    /**
     * BlogService constructor.
     * @param $lang
     */
    public function __construct($lang)
    {
        $this->categories = new CategoriesRepository($lang);
        $this->tags = new TagsRepository($lang);
        $this->posts = new PostRepository($lang);
    }

    /**
     * @return array
     */
    public function many()
    {
        $categories = $this->categories->all();
        $tags = $this->tags->all();
        $posts = $this->posts->all();

        return [
            'categories' => $categories,
            'tags' => $tags,
            'posts' => $posts,
        ];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function single($id)
    {
        if ($id) {
            return Post::where('id', $id)->first();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function singleComment($id)
    {
        if ($id) {
            return Comment::where('id', $id)->first();
        }
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function singleBySlug($slug)
    {
        if ($slug) {
            return Post::where('slug', $slug)->first();
        }
    }

    /**
     * @return mixed
     */
    public function postList()
    {
        return $this->posts->all();
    }

    /**
     * @param $request
     */
    public function createPost($request)
    {
        $service = new ImagesService;

        
        
        $data = $request->except(['tags', 'categories', 'lang']);
        $data['author_id'] = authenticated()->id;
        $data["blogimg"] = $service->create($request->files()["blogimg"]);
        $post = Post::create($data);

        np_log('store', [
            'type' => "Post",
            'id' => $post->id
        ]);

        $tags = $request->all()['tags'];
        $post->tags()->attach($tags);

        $categories = $request->all()['categories'];
        $post->categories()->attach($categories);
    }

    /**
     * @param $request
     */
    public function updatePost($request)
    {
        $service = new ImagesService;

        $update = $request->except(['id', 'categories', 'tags', 'lang']);
        $id = $request->only(['id'])['id'];

        if($request->files()['blogimg']->getClientFilename()) {
            $update['blogimg'] = $service->create($request->files()["blogimg"]);            
        }
        
        $this->posts->update($update, $id);

        np_log('edit', [
            'type' => "Post",
            'id' => $id
        ]);

        $post = $this->single($id);

        $categories = $request->all()['categories'];
        $post->categories()->sync($categories);

        $tags = $request->all()['tags'];
        $post->tags()->sync($tags);
    }
}