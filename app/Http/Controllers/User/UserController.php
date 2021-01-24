<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShopOrder;
use App\Models\ShopProduct;
use App\Models\ShopReview;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserWishlist;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function account()
    {
        $wishlist = UserWishlist::where('user_id', Auth::user()->id)->select('shop_product_id')->get()->toArray();
        if ($wishlist) {
            foreach ($wishlist as $key => $value)
                $user_products_wishlist[] = $value['shop_product_id'];

            $products_in_wishlist = ShopProduct::whereIn('id', $user_products_wishlist)->get();
        } else {
            $products_in_wishlist = [];
        }

        $addresses = UserAddress::where('user_id', '=', Auth::user()->id)->get();
        $orders = ShopOrder::where('user_id', '=', Auth::user()->id)->get();

        $orders_ids = [];
        foreach ($orders as $order) {
            $orders_ids[] = $order->id;
        }
        if ($orders_ids) {
            $wait_for_review = DB::table('shop_order_shop_review')->whereIn('order_id', $orders_ids)->get();

            if ($wait_for_review) {
                $products_in_wait_for_review_ids = [];
                foreach ($wait_for_review as $item) {
                    if ($item->review_id == null) {
                        $products_in_wait_for_review_ids[] = $item->product_id;
                    }
                }
                $products_in_wait_for_review = ShopProduct::whereIn('id', $products_in_wait_for_review_ids)->get();
                $products_in_wait_for_review->each(function ($item, $key) {
                    $item->link = DB::table('shop_order_shop_review')->where('product_id', $item->id)->value('id');
                });
            } else {
                $products_in_wait_for_review = [];
            }
        } else {
            $products_in_wait_for_review = [];
        }

        $reviews = ShopReview::where('user_id', '=', Auth::user()->id)->get();

        return view('user.account', compact('addresses', 'orders', 'products_in_wishlist', 'reviews', 'products_in_wait_for_review'));
    }

    public function storeAddress(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $address = UserAddress::create($data);

        if ($address) {
            return redirect()->route('account');
        } else {
            return redirect()->route('account');
        }
    }

    public function updateAddress($id, Request $request)
    {
        $address = UserAddress::find($id);
        $address->update($request->all());

        return redirect()->route('account');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //send mail to confirm email
        event(new Registered($user));

        session()->flash('success', 'Вы успешно зарегистрированы!');
        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    public function login(Request $request)
    {
        // TODO
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($request->input('remember') == 'on') {
            $remember = true;
        } else {
            $remember = false;
        }

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $remember)) {
            if (Auth::user()->is_admin) {
                session_start();
                $_SESSION['ckfinder_auth'] = true;

                return redirect()->route('admin.index');
            } else {
                return redirect()->route('shop.index');
            }
        }

        return redirect()->back()->withErrors('Данные введены не корректно');
    }

    public function logout()
    {
        session_start();
        $_SESSION['ckfinder_auth'] = false;

        Auth::logout();

        return redirect()->route('auth');
    }
}
