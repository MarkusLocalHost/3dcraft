<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogCommentRequest;
use App\Http\Requests\UpdateBlogCommentRequest;
use App\Models\BlogComment;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $comments = BlogComment::with('user')->get();

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $posts = BlogPost::pluck('title', 'id')->all();
        $users = User::pluck('name', 'id')->all();
        $comments = BlogComment::pluck('content', 'id')->all();

        return view('admin.comments.create', compact('posts', 'users', 'comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBlogCommentRequest $request)
    {
        $data = $request->all();
        $comment = BlogComment::create($data);

        return redirect()->route('comments.index')->with('success', 'Комментарий добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $comment = BlogComment::find($id);

        return view('admin.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBlogCommentRequest $request, $id)
    {
        $comment = BlogComment::find($id);
        $comment->update($request->all());

        return redirect()->route('comments.index')->with('success', 'Комментарий изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $result = BlogComment::destroy($id);

        return redirect()->route('comments.index')->with('success', 'Комментарий удален');
    }

    public function trash()
    {
        $deleted_comments = BlogComment::onlyTrashed()->get();

        return view('admin.comments.trash', compact('deleted_comments'));
    }

    public function restore($id)
    {
        $restored_comment = BlogComment::withTrashed()->find($id)->restore();

        return redirect()->route('comments.index')->with('success', 'Комментарий восстановлен');
    }
}
