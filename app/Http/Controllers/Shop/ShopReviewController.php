<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopReviewRequest;
use App\Models\ShopProduct;
use App\Models\ShopReview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopReviewController extends Controller
{
    public function index($uuid)
    {
        $review_link = DB::table('shop_order_shop_review')->where('id', $uuid)->get();

        if ($review_link->count() == 1) {
            $product = ShopProduct::find($review_link[0]->product_id);
            return view('reviews.index', compact('uuid', 'product'));
        }

        return abort(404);
    }

    public function store(StoreShopReviewRequest $request)
    {
        $data = $request->input();

        $review_link = DB::table('shop_order_shop_review')->where('id', $request->input('uuid'))->get();
        $data['shop_product_id'] = $review_link[0]->product_id;

        $data['user_id'] = Auth::user()->id;

        $review = ShopReview::create($data);

        DB::table('shop_order_shop_review')->where('id', $request->input('uuid'))->update([
            'review_id'  => $review->id,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('account');
    }
}
