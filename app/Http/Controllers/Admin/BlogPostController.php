<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $posts = BlogPost::with('category', 'tags', 'user')->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categories = BlogCategory::pluck('title', 'id')->all();
        $tags = BlogTag::pluck('title', 'id')->all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBlogPostRequest $request)
    {
        $data = $request->all();

        $data['thumbnail'] = BlogPost::uploadImage($request);

        $post = BlogPost::create($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Статья добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = BlogPost::find($id);
        $categories = BlogCategory::pluck('title', 'id')->all();
        $tags = BlogTag::pluck('title', 'id')->all();

        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBlogPostRequest $request, $id)
    {
        $post = BlogPost::find($id);
        $data = $request->all();

        if ($file = BlogPost::uploadImage($request, $post->thumbnail)) {
            $data['thumbnail'] = $file;
        }

        $post->update($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Статья изменена');
    }

    public function destroy($id)
    {
        // TODO связать удаление комментариев
        $result = BlogPost::destroy($id);

        return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }

    public function trash()
    {
        $deleted_posts = BlogPost::onlyTrashed()->get();

        return view('admin.posts.trash', compact('deleted_posts'));
    }

    public function restore($id)
    {
        $restored_post = BlogPost::withTrashed()->find($id)->restore();

        return redirect()->route('posts.index')->with('success', 'Статья восстановлена');
    }
}
