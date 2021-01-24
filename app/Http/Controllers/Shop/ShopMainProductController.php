<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\ShopConnection;
use App\Models\ShopProduct;
use App\Models\ShopProductPhoto;
use App\Models\ShopReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopMainProductController extends Controller
{
    public function index($shop_product)
    {
        $product = ShopProduct::where('slug', '=', $shop_product)->firstOrFail();
        $gallery = ShopProductPhoto::where('product_id', '=', $product->id)->get();
        $order_count = DB::table('shop_order_shop_product')->where('shop_product_id', $product->id)->count();
        $reviews = ShopReview::where('shop_product_id', $product->id)->with('user')->get();

        if ($reviews->count() > 0) {
            $sum_of_rating = 0;
            foreach ($reviews as $review)
                $sum_of_rating += $review->rating;

            $rating = $sum_of_rating / $reviews->count();
        } else {
            $rating = null;
        }

        $products_connection = ShopConnection::where('product_id', '=', $product->id)->first();
        if ($products_connection) {
            $products_to_connect = ShopProduct::whereIn('id', explode(',', $products_connection->product_ids_to_connect))->get();
        } else {
            $products_to_connect = null;
        }

        return view('shop.product', compact('product', 'gallery', 'order_count', 'products_to_connect', 'reviews', 'rating'));
    }
}
