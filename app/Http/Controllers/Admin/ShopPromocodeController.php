<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopPromocodeRequest;
use App\Http\Requests\UpdateShopPromocodeRequest;
use App\Models\ShopPromocode;
use Illuminate\Http\Request;

class ShopPromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $promocodes = ShopPromocode::all();

        return view('admin.shop_promocodes.index', compact('promocodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.shop_promocodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreShopPromocodeRequest $request)
    {
        ShopPromocode::create($request->all());

        return redirect()->route('shop_promocodes.index')->with('success', 'Промокод добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $promocode = ShopPromocode::find($id);

        return view('admin.shop_promocodes.edit', compact('promocode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateShopPromocodeRequest $request, $id)
    {
        $promocode = ShopPromocode::find($id);
        $promocode->update($request->all());

        return redirect()->route('shop_promocodes.index')->with('success', 'Промокод изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $sale = ShopPromocode::find($id);
        // TODO
//        if ($category->posts->count()) {
//            return redirect()->route('categories.index')->with('error', 'В данной категории есть статьи. Удаление невозможно!');
//        }
        $sale->destroy($id);

        return redirect()->route('shop_promocodes.index')->with('success', 'Промокод удален');
    }

    public function trash()
    {
        $deleted_promocodes = ShopPromocode::onlyTrashed()->get();

        return view('admin.shop_promocodes.trash', compact('deleted_promocodes'));
    }

    public function restore($id)
    {
        $restored_promocodes = ShopPromocode::withTrashed()->find($id)->restore();

        return redirect()->route('shop_promocodes.index')->with('success', 'Промокод восстановлен');
    }
}
