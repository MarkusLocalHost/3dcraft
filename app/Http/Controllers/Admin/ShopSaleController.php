<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopSaleRequest;
use App\Http\Requests\UpdateShopSaleRequest;
use App\Models\ShopSale;
use Illuminate\Http\Request;

class ShopSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $sales = ShopSale::all();

        return view('admin.shop_sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.shop_sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreShopSaleRequest $request)
    {
        ShopSale::create($request->all());

        return redirect()->route('shop_sales.index')->with('success', 'Скидка добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $sale = ShopSale::find($id);

        return view('admin.shop_sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateShopSaleRequest $request, $id)
    {
        $sale = ShopSale::find($id);
        $sale->update($request->all());

        return redirect()->route('shop_sales.index')->with('success', 'Скидка изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $sale = ShopSale::find($id);
        // TODO
//        if ($category->posts->count()) {
//            return redirect()->route('categories.index')->with('error', 'В данной категории есть статьи. Удаление невозможно!');
//        }
        $sale->destroy($id);

        return redirect()->route('shop_sales.index')->with('success', 'Скидка удалена');
    }

    public function trash()
    {
        $deleted_sales = ShopSale::onlyTrashed()->get();

        return view('admin.shop_sales.trash', compact('deleted_sales'));
    }

    public function restore($id)
    {
        $restored_sales = ShopSale::withTrashed()->find($id)->restore();

        return redirect()->route('shop_sales.index')->with('success', 'Скидка восстановлена');
    }
}
