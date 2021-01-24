<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\ShopCategory;
use App\Models\ShopProduct;
use App\Models\ShopSection;
use App\Models\UserWishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopMainController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage') ?? 8;
        $section = null;

        $products = ShopProduct::where('status', '=', 1)->with('sale')->paginate($perPage);
        $categories = ShopCategory::all();

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

        return view('shop.index', compact('categories', 'products', 'perPage', 'section', 'user_products_wishlist', 'compare_product_ids'));
    }

    public function section($shop_section, Request $request)
    {
        $perPage = $request->input('perPage') ?? 8;

        $section = ShopSection::where('slug', '=', $shop_section)->firstOrFail();
        $categories = ShopCategory::where('section_id', '=', $section->id)->get();
        $list = [];
        foreach ($categories as $category):
            array_push($list, $category->id);
        endforeach;
        $products = ShopProduct::where('status', '=', 1)->whereIn('category_id', $list)->with('sale')->paginate($perPage);

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

        return view('shop.index', compact('categories', 'products', 'perPage', 'section', 'user_products_wishlist', 'compare_product_ids'));
    }

    public function category($shop_section, $shop_category, Request $request)
    {
        $perPage = $request->input('perPage') ?? 8;

        $section = ShopSection::where('slug', '=', $shop_section)->firstOrFail();
        $categories = ShopCategory::where('section_id', '=', $section->id)->get();
        $category = ShopCategory::where('slug', '=', $shop_category)->firstOrFail();
        $products = ShopProduct::where('status', '=', 1)->where('category_id', '=', $category->id)->with('sale')->paginate($perPage);

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

        return view('shop.index', compact('categories', 'products', 'perPage', 'section', 'user_products_wishlist', 'compare_product_ids'));
    }
}
