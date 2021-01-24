<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShopConnection;
use App\Models\ShopProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopConnectionController extends Controller
{
    public function index()
    {
        $products = ShopProduct::all();

        return view('admin.shop_connections.index', compact('products'));
    }

    public function edit($shop_product)
    {
        $product_main = ShopProduct::where('id', '=', $shop_product)->firstOrFail();
        $connection = explode(',', ShopConnection::where('id', '=', $shop_product)->value('product_ids_to_connect'));
        $products = ShopProduct::pluck('product_name', 'id');

        // Recommended products to connect
        $products_in_same_category = ShopProduct::where('category_id', $product_main->category_id)->get();
        foreach ($products_in_same_category as $product_in_same_category) {
            $count_of_orders[$product_in_same_category->id] = DB::table('shop_order_shop_product')->where('shop_product_id', $product_in_same_category->id)->count();
        }
        $count_of_orders = array_filter($count_of_orders, function($a) { return ($a !== 0); });
        $recommended_products = ShopProduct::whereIn('id', array_keys($count_of_orders))->get();

        return view('admin.shop_connections.edit', compact('products', 'connection', 'product_main', 'recommended_products'));
    }

    public function update($shop_product, Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        $data['product_id'] = $shop_product;
        $data["product_ids_to_connect"] = implode(',', $data["product_ids_to_connect"]);

        $connection = ShopConnection::where('product_id', '=', $shop_product)->first();
        if ($connection) {
            $connection->update($data);
        } else {
            $new_connection = ShopConnection::create($data);
        }

        return redirect()->route('shop_connections.index')->with('success', 'Связи товара изменены');
    }
}
