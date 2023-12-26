<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository extends BaseRepository
{
    public function model()
    {
        return Post::class;
    }

    public function getPostBySlug($slug)
    {
        return $this->model->where('slug', 'LIKE', '%' . $slug . '%')->first();
    }

    public function getRelatedPost($id, $category)
    {
        return $this->model->where('id', '!=', $id)->where('category', $category)->take(5)->get();
    }

    public function getCategoryPost() {
        return $this->model->select('category')->distinct()->get();
    }
}
