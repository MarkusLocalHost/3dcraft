<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopSectionRequest;
use App\Http\Requests\UpdateShopSectionRequest;
use App\Models\ShopSection;
use Illuminate\Http\Request;

class ShopSectionController extends Controller
{
    public function index()
    {
        $sections = ShopSection::withTrashed()->get();

        return view('admin.shop_sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.shop_sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreShopSectionRequest $request)
    {
        ShopSection::create($request->all());

        return redirect()->route('shop_sections.index')->with('success', 'Раздел добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $section = ShopSection::find($id);

        return view('admin.shop_sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateShopSectionRequest $request, $id)
    {
        $sections = ShopSection::find($id);
        $sections->update($request->all());

        return redirect()->route('shop_sections.index')->with('success', 'Раздел изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $sections = ShopSection::find($id);
        // TODO
//        if ($category->posts->count()) {
//            return redirect()->route('categories.index')->with('error', 'В данной категории есть статьи. Удаление невозможно!');
//        }
        $sections->destroy($id);

        return redirect()->route('shop_sections.index')->with('success', 'Раздел удален');
    }

    public function restore($id)
    {
        $restored_section = ShopSection::withTrashed()->find($id)->restore();

        return redirect()->route('shop_sections.index')->with('success', 'Раздел восстановлен');
    }
}
