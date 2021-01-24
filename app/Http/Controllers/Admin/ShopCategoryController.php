<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopCategoryRequest;
use App\Http\Requests\UpdateShopCategoryRequest;
use App\Models\ShopCategory;
use App\Models\ShopSection;
use Illuminate\Http\Request;

class ShopCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $categories = ShopCategory::with('section')->get();

        return view('admin.shop_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $sections = ShopSection::pluck('title', 'id');

        return view('admin.shop_categories.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreShopCategoryRequest $request)
    {
        ShopCategory::create($request->all());

        return redirect()->route('shop_categories.index')->with('success', 'Категория добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = ShopCategory::find($id);
        $sections = ShopSection::pluck('title', 'id');

        return view('admin.shop_categories.edit', compact('category', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateShopCategoryRequest $request, $id)
    {
        $category = ShopCategory::find($id);
        $category->update($request->all());

        return redirect()->route('shop_categories.index')->with('success', 'Категория изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = ShopCategory::find($id);
        // TODO
//        if ($category->posts->count()) {
//            return redirect()->route('categories.index')->with('error', 'В данной категории есть статьи. Удаление невозможно!');
//        }
        $category->destroy($id);

        return redirect()->route('shop_categories.index')->with('success', 'Категория удалена');
    }

    public function trash()
    {
        $deleted_categories = ShopCategory::onlyTrashed()->get();

        return view('admin.shop_categories.trash', compact('deleted_categories'));
    }

    public function restore($id)
    {
        $restored_category = ShopCategory::withTrashed()->find($id)->restore();

        return redirect()->route('shop_categories.index')->with('success', 'Категория восстановлена');
    }
}
