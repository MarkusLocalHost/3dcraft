<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopDeliveryRequest;
use App\Http\Requests\UpdateShopDeliveryRequest;
use App\Models\ShopDelivery;
use Illuminate\Http\Request;

class ShopDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $deliveries = ShopDelivery::all();

        return view('admin.shop_deliveries.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.shop_deliveries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreShopDeliveryRequest $request)
    {
        ShopDelivery::create($request->all());

        return redirect()->route('shop_deliveries.index')->with('success', 'Новый вид доставки добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $delivery = ShopDelivery::findOrFail($id);

        return view('admin.shop_deliveries.edit', compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateShopDeliveryRequest $request, $id)
    {
        $delivery = ShopDelivery::find($id);
        $delivery->update($request->all());

        return redirect()->route('shop_deliveries.index')->with('success', 'Вид доставки изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $delivery = ShopDelivery::find($id);
        // TODO
//        if ($category->posts->count()) {
//            return redirect()->route('categories.index')->with('error', 'В данной категории есть статьи. Удаление невозможно!');
//        }
        $delivery->destroy($id);

        return redirect()->route('shop_deliveries.index')->with('success', 'Вид доставки удален');
    }

    public function trash()
    {
        $deleted_deliveries = ShopDelivery::onlyTrashed()->get();

        return view('admin.shop_deliveries.trash', compact('deleted_deliveries'));
    }

    public function restore($id)
    {
        $restored_delivery = ShopDelivery::withTrashed()->find($id)->restore();

        return redirect()->route('shop_deliveries.index')->with('success', 'Вид доставки восстановлен');
    }
}
