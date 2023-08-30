<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CommentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        $dataComment = $this->commentRepository->listComment();

        return view('admin.comment.list-comment', compact('dataComment'));
    }

    public function showComment($id)
    {
        $dataComment = $this->commentRepository->showComment($id);

        return view('admin.comment.show-comment', compact('dataComment'));
    }

    public function changeStatusComment(Request $request)
    {
        $status = $request->get('status');
        $id = $request->get('id');
        $data = [
            'status' => $status
        ];

        $this->commentRepository->updateStatusComment($id, $data);

        return redirect()->route('comment.index');
    }
}
