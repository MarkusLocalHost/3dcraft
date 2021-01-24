<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\ShopCategory;
use App\Models\ShopProduct;
use App\Models\UserWishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopSearchController extends Controller
{
    public function search(Request $request)
    {
        $perPage = $request->input('perPage') ?? 8;

        $categories = ShopCategory::all();
        $section = null;

        if ($request->has('search')) {
            $products = ShopProduct::search($request->input('search'))->paginate($perPage);
        } else {
            $products = ShopProduct::where('status', '=', 1)->with('sale')->paginate($perPage);
        }

        if (Auth::user()) {
            $wishlist = UserWishlist::where('user_id', Auth::user()->id)->select('shop_product_id')->get()->toArray();
            if ($wishlist) {
                foreach ($wishlist as $key => $value)
                    $user_products_wishlist[] = $value['shop_product_id'];
            } else {
                $user_products_wishlist = [];
            }
        } else {
            $user_products_wishlist = [];
        }

        $compareModelsData = session()->get('modelsCompare');
        $comparePlastikData = session()->get('plastikCompare');
        if ($compareModelsData and $comparePlastikData) {
            $compare_product_ids = array_merge($compareModelsData, $comparePlastikData);
        } elseif ($compareModelsData) {
            $compare_product_ids = $compareModelsData;
        } elseif ($comparePlastikData) {
            $compare_product_ids = $comparePlastikData;
        } else {
            $compare_product_ids = [];
        }

        return view('shop.index', compact('products', 'compare_product_ids', 'user_products_wishlist', 'perPage', 'categories', 'section'));
    }
}
