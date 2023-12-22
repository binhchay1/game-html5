<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function listPost()
    {
        $listPost = $this->postRepository->get();

        return view('admin.post.list-post', compact('listPost'));
    }

    public function createPost()
    {
        return view('admin.post.create-post');
    }

    public function storePost()
    {
        return view();
    }

    public function formerSlugPost(Request $request)
    {
        $slug = $request->get('slug');
        $type = $request->get('type');

        if (empty($slug) or empty($type)) {
            $status = false;

            return $status;
        }

        if ($type == 'create') {
            $query = $this->postRepository->getBySlug($slug);

            if (empty($query)) {
                $status = true;
            } else {
                $status = false;
            }
        } else {
            $idSlug = $request->get('id');
            $getSlugById = $this->postRepository->getById($idSlug);

            if ($getSlugById->slug == $slug) {
                $status = true;
            } else {
                $query = $this->postRepository->getBySlug($slug);
                if (empty($query)) {
                    $status = true;
                } else {
                    $status = false;
                }
            }
        }

        return $status;
    }
}
