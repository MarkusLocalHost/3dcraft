<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $categories = BlogCategory::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBlogCategoryRequest $request)
    {
        BlogCategory::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Категория добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = BlogCategory::find($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBlogCategoryRequest $request, $id)
    {
        $category = BlogCategory::find($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Категория изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = BlogCategory::find($id);
        // TODO
//        if ($category->posts->count()) {
//            return redirect()->route('categories.index')->with('error', 'В данной категории есть статьи. Удаление невозможно!');
//        }
        $category->destroy($id);

        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }

    public function trash()
    {
        $deleted_categories = BlogCategory::onlyTrashed()->get();

        return view('admin.categories.trash', compact('deleted_categories'));
    }

    public function restore($id)
    {
        $restored_category = BlogCategory::withTrashed()->find($id)->restore();

        return redirect()->route('categories.index')->with('success', 'Категория восстановлена');
    }
}
