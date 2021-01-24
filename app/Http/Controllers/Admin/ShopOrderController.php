<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopOrderRequest;
use App\Http\Requests\UpdateShopOrderRequest;
use App\Models\ShopDelivery;
use App\Models\ShopOrder;
use App\Models\ShopPromocode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $orders = ShopOrder::where('status', '!=', 4)->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function completed()
    {
        $completed_orders = ShopOrder::where('status', '=', 4)->get();

        return view('admin.orders.completed', compact('completed_orders'));
    }

    public function canceled()
    {
        $canceled_orders = ShopOrder::onlyTrashed()->get();

        return view('admin.orders.canceled', compact('canceled_orders'));
    }

    public function show($id)
    {
        $order = ShopOrder::findOrFail($id);
        $additional_informations = DB::table('shop_order_shop_product')->where('shop_order_id', $id)->get();

        return view('admin.orders.show', compact('order', 'additional_informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        $promocodes = ShopPromocode::where('status', '=', 1)->pluck('title', 'id');
        $deliveries = ShopDelivery::where('status', '=', 1)->pluck('title', 'id');

        return view('admin.orders.create', compact('users', 'promocodes', 'deliveries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreShopOrderRequest $request)
    {
        $order = ShopOrder::create($request->all());

        return redirect()->route('shop_orders.index')->with('success', 'Заказ добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $order = ShopOrder::find($id);
        $users = User::pluck('name', 'id');
        $promocodes = ShopPromocode::where('status', '=', 1)->pluck('title', 'id');
        $deliveries = ShopDelivery::where('status', '=', 1)->pluck('title', 'id');

        return view('admin.orders.edit', compact('users', 'promocodes', 'deliveries', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateShopOrderRequest $request, $id)
    {
        $order = ShopOrder::find($id);
        $order->update($request->all());

        return redirect()->route('shop_orders.index')->with('success', 'Заказ изменен');
    }
}
