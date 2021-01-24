<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShopDelivery;
use App\Models\ShopProduct;
use App\Models\ShopPromocode;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    public function cart(Request $request)
    {
        $cartData = session()->get('cart');
        if ($cartData) {
            $product_ids = array_keys($cartData);
            $products = ShopProduct::where('status', '=', 1)->whereIn('id', $product_ids)->get();
        } else {
            $products = null;
        }

        $deliveries = ShopDelivery::where('status', '=', 1)->get();

        return view('user.cart', compact('products', 'cartData', 'deliveries'));
    }

    public function verifyPromocode(Request $request)
    {
        if ($promocode = ShopPromocode::where('title', $request->input('promocode'))->firstOrFail()) {
            return $promocode->percent;
        }
        return abort(404);
    }

    public function addToCart(Request $request)
    {
        $id = $request->input('product_id');
        $qty = $request->input('qty') ?? 1;
        $cartData = session()->get('cart') ?? array();

        if (array_key_exists($id, $cartData)) {
            $cartData[$id]['qty'] += $qty;
        } else {
            $cartData[$id] = array('qty' => $qty);
        }

        session()->put('cart', $cartData);
    }

    public function removeFromCart(Request $request)
    {
        $id = $request->input('product_id');
        $cartData = session()->get('cart');

        if (array_key_exists($id, $cartData)) {
            unset($cartData[$id]);
        }

        session()->put('cart', $cartData);
    }

    public function plusQty(Request $request)
    {
        $id = $request->input('product_id');
        $cartData = session()->get('cart');

        if (array_key_exists($id, $cartData)) {
            $cartData[$id]['qty']++;
        }

        session()->put('cart', $cartData);
    }

    public function minusQty(Request $request)
    {
        $id = $request->input('product_id');
        $cartData = session()->get('cart') ?? array();

        if (array_key_exists($id, $cartData)) {
            $cartData[$id]['qty']--;
        }

        session()->put('cart', $cartData);
    }

    public function clear(Request $request)
    {
        $request->session()->forget('cart');
    }
}
