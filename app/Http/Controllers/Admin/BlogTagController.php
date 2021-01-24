<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogTagRequest;
use App\Http\Requests\UpdateBlogTagRequest;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $tags = BlogTag::all();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBlogTagRequest $request)
    {
        BlogTag::create($request->all());

        return redirect()->route('tags.index')->with('success', 'Тег добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $tag = BlogTag::find($id);

        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBlogTagRequest $request, $id)
    {
        $tag = BlogTag::find($id);
        $tag->update($request->all());

        return redirect()->route('tags.index')->with('success', 'Тег изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $tag = BlogTag::find($id);
        // TODO
//        if ($tag->posts->count()) {
//            return redirect()->route('tags.index')->with('error', 'Тег невозможно удалить! Есть связаные статьи.');
//        }
        $tag->destroy($id);

        return redirect()->route('tags.index')->with('success', 'Тег удален');
    }

    public function trash()
    {
        $deleted_tags = BlogTag::onlyTrashed()->get();

        return view('admin.tags.trash', compact('deleted_tags'));
    }

    public function restore($id)
    {
        $restored_tag = BlogTag::withTrashed()->find($id)->restore();

        return redirect()->route('tags.index')->with('success', 'Тег восстановлен');
    }
}
