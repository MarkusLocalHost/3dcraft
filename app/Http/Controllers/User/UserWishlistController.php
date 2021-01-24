<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserWishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserWishlistController extends Controller
{
    public function addOrRemoveFromWishlist(Request $request)
    {
        $product_id = $request->input('product_id');
        $user_id = Auth::user()->id;

        if (UserWishlist::where('shop_product_id', $product_id)->where('user_id', $user_id)->count()) {
            UserWishlist::where('shop_product_id', $product_id)->where('user_id', $user_id)->delete();
            return 'removed';
        } else {
            $wish = UserWishlist::create([
                'user_id'         => $user_id,
                'shop_product_id' => $product_id,
            ]);
            return 'added';
        }
    }
}
