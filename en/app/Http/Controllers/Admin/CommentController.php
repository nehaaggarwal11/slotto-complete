<?php

namespace App\Http\Controllers\Admin;

use App\News;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comments = Comment::all();
        
        return view('admin.comments.index', compact('comments'));
    }

    // public function edit(Comment $comment)
    // {
    //     abort_if(Gate::denies('comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $comment->load('news');

    //     return view('admin.comments.edit', compact('comment'));
    // }

    public function statusUpdate(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->status = $request->status;
        $comment->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function show(Comment $comments )
    {
        abort_if(Gate::denies('comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $comment->load('news');
        
        dd($comments);
        
        // return view('admin.comments.show', compact('comments'));
    }
}