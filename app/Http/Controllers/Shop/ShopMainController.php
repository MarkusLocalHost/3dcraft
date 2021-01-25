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

        $productsAll = ShopProduct::where('status', '=', 1)->get();
        $categories = ShopCategory::all();

        // wishlist
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

        // compare
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

        // min ans max prices
        $minPrice = $productsAll->min('price');
        $maxPrice = $productsAll->max('price');
        $minPriceFilter = $request->input('minPrice') ?? $minPrice;
        $maxPriceFilter = $request->input('maxPrice') ?? $maxPrice;
        $products = ShopProduct::where('status', '=', 1)
            ->whereBetween('price', [$minPriceFilter, $maxPriceFilter])
            ->with('sale')
            ->paginate($perPage);

        return view('shop.index', compact('categories', 'products', 'perPage', 'section', 'user_products_wishlist', 'compare_product_ids', 'minPrice', 'maxPrice'));
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
        $productsAll = ShopProduct::where('status', '=', 1)->whereIn('category_id', $list)->paginate($perPage);

        // wishlist
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

        // compare
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

        // min ans max prices
        $minPrice = $productsAll->min('price');
        $maxPrice = $productsAll->max('price');
        $minPriceFilter = $request->input('minPrice') ?? $minPrice;
        $maxPriceFilter = $request->input('maxPrice') ?? $maxPrice;

        //height
        $height = $request->input('height');

        //weight
        $weight = $request->input('weight');

        //color
        $color = $request->input('color');

        $products = ShopProduct::where('status', '=', 1)
            ->where('category_id', '=', $category->id)
            ->whereBetween('price', [$minPriceFilter, $maxPriceFilter])
            ->when($height, function ($query, $height) {
                if ($height == 'max') {
                    return $query->where('height', '>=', 15);
                } else {
                    return $query->where('height', '<=', intval($height));
                }
            })
            ->when($weight, function ($query, $weight) {
                if ($weight == '5') {
                    return $query->where('weight', '=', 5);
                } else {
                    return $query->where('weight', '=', intval($weight));
                }
            })
            ->when($color, function ($query, $color) {
                return $query->where('color', $color);
            })
            ->with('sale')
            ->paginate($perPage);

        return view('shop.index', compact('categories', 'products', 'perPage', 'section', 'user_products_wishlist', 'compare_product_ids', 'minPrice', 'maxPrice'));
    }

    public function category($shop_section, $shop_category, Request $request)
    {
        $perPage = $request->input('perPage') ?? 8;

        $section = ShopSection::where('slug', '=', $shop_section)->firstOrFail();
        $categories = ShopCategory::where('section_id', '=', $section->id)->get();
        $category = ShopCategory::where('slug', '=', $shop_category)->firstOrFail();
        $productsAll = ShopProduct::where('status', '=', 1)->where('category_id', '=', $category->id)->paginate($perPage);

        // wishlist
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

        // compare
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

        // min ans max prices
        $minPrice = $productsAll->min('price');
        $maxPrice = $productsAll->max('price');
        $minPriceFilter = $request->input('minPrice') ?? $minPrice;
        $maxPriceFilter = $request->input('maxPrice') ?? $maxPrice;

        //height
        $height = $request->input('height');

        //weight
        $weight = $request->input('weight');

        //color
        $color = $request->input('color');

        $products = ShopProduct::where('status', '=', 1)
            ->where('category_id', '=', $category->id)
            ->whereBetween('price', [$minPriceFilter, $maxPriceFilter])
            ->when($height, function ($query, $height) {
                if ($height == 'max') {
                    return $query->where('height', '>=', 15);
                } else {
                    return $query->where('height', '<=', intval($height));
                }
            })
            ->when($weight, function ($query, $weight) {
                if ($weight == '5') {
                    return$query->where('weight', '=', 5);
                } else {
                    return $query->where('weight', '=', intval($weight));
                }
            })
            ->when($color, function ($query, $color) {
                return $query->where('color', $color);
            })
            ->with('sale')
            ->paginate($perPage);

        return view('shop.index', compact('categories', 'products', 'perPage', 'section', 'user_products_wishlist', 'compare_product_ids', 'minPrice', 'maxPrice'));
    }
}
