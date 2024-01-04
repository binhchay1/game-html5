<?php

namespace App\Http\Controllers;

use App\Enums\Ultity;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    protected $postRepository;
    protected $ultity;

    public function __construct(PostRepository $postRepository, Ultity $ultity)
    {
        $this->postRepository = $postRepository;
        $this->ultity = $ultity;
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

    public function storePost(Request $request)
    {
        $input = $request->except(['_token']);
        $input['author_id'] = Auth::user()->id;
        $input['content'] = html_entity_decode($input['content']);

        if (isset($input['thumb'])) {
            $img = $this->ultity->saveImagePost($input);
            if ($img) {
                $path = 'images/posts/' . $input['thumb']->getClientOriginalName() . '_' . strtotime(date('Y-m-d H:i:s'));
                $input['thumb'] = $path;
            }
        }

        $result = $this->postRepository->create($input);

        if ($result) {
            $alert = 'Successfully to store!';
        } else {
            $alert = 'Failed to edit!';
        }

        return redirect()->route('post.index')->with('success', $alert);
    }

    public function editPost($id)
    {
        $post = $this->postRepository->getById($id);

        return view('admin.post.edit-post', compact('post'));
    }

    public function updatePost($id, Request $request)
    {
        $input = $request->except(['_token']);
        $input['author_id'] = Auth::user()->id;
        $input['content'] = html_entity_decode($input['content']);

        if (isset($input['thumb'])) {
            $img = $this->ultity->saveImagePost($input);
            if ($img) {
                $path = 'images/posts/' . $input['thumb']->getClientOriginalName();
                $input['thumb'] = $path;
            }
        }

        $result = $this->postRepository->updateById($id, $input);

        if ($result) {
            $alert = 'Successfully to store!';
        } else {
            $alert = 'Failed to edit!';
        }

        return redirect()->route('post.index')->with('success', $alert);
    }

    public function deletePost(Request $request)
    {
        $id = $request->get('id');
        $this->postRepository->deleteById($id);

        return redirect()->route('post.index')->with('success', 'Deleted post!');
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
            $query = $this->postRepository->getPostBySlug($slug);

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
                $query = $this->postRepository->getPostBySlug($slug);
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
