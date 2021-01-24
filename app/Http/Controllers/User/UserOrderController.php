<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderInfoMail;
use App\Models\ShopDelivery;
use App\Models\ShopOrder;
use App\Models\ShopProduct;
use App\Models\ShopPromocode;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserOrderController extends Controller
{
    public function orderCreate(Request $request)
    {
        $deliveryTypeID = $request->input('deliveryType');
        if ($deliveryTypeID) {
            $delivery = ShopDelivery::where('status', '=', 1)->findOrFail($deliveryTypeID);
        }
        $promocodeTitle = $request->input('promocode');
        if ($promocodeTitle) {
            $promocode = ShopPromocode::where('status', '=', 1)->where('title', '=', $promocodeTitle)->firstOrFail();
        } else {
            $promocode = null;
        }
        $finalSum = 0;

        $cartData = session()->get('cart');
        if ($cartData) {
            $product_ids = array_keys($cartData);
            $products = ShopProduct::where('status', '=', 1)->whereIn('id', $product_ids)->with('sale')->get();

            foreach ($products as $product) {
                if ($product->sale_id) {
                    $finalSum += ($product->price - $product->sale->amount) * (100 - $product->sale->percent) / 100 * $cartData[$product->id]['qty'];
                } else {
                    $finalSum += $product->price * $cartData[$product->id]['qty'];
                }
            }
        }

        $product_ids_str = '';
        foreach ($product_ids as $key => $value) {
            $product_ids_str .= $value;
            $product_ids_str .= ' ';
        }

        if (Auth::user()) {
            $addresses = UserAddress::where('user_id', '=', Auth::user()->id)->get();
        } else {
            $addresses = [];
        }

        return view('user.order', compact('promocode', 'delivery', 'finalSum', 'product_ids_str', 'addresses'));
    }

    public function orderStore(Request $request)
    {
        $request->validate([
            'deliveryID' => 'required|integer',
            'sum' => 'required|integer',
            'productIDs' => 'required',
            'addressID' => 'required',
        ]);

        $data = $request->input();
        $cartData = session()->get('cart');
        if (isset($data['promocodeTitle'])) {
            $promocode = ShopPromocode::where('status', '=', 1)->where('title', '=', $data['promocodeTitle'])->firstOrFail();
        }
        $products = ShopProduct::where('status', '=', 1)->whereIn('id', explode(' ', $data['productIDs']))->with('sale')->get();

        if (strpos($data['addressID'], ';') !== false) {
            $data_address = explode(';', $data['addressID']);
            $address = UserAddress::create([
                'user_id' => Auth::user()->id,
                'name' => $data_address[0],
                'secondname' => $data_address[1],
                'lastname' => $data_address[2],
                'address' => $data_address[3],
                'postal_code' => $data_address[4],
            ]);
            $address = $address->id;
        } else {
            $address = (int)$data['addressID'];
        }

        $order = ShopOrder::create([
            'user_id' => Auth::user()->id,
            'promocode_id' => $promocode->id ?? null,
            'delivery_id' => (int)$data['deliveryID'],
            'address_id' => $address,
            'pay_method' => 'test',
            'sum' => (float)$data['sum'],
            'status' => 1
        ]);

        foreach ($products as $product) {
            if ($product->sale_id) {
                $price = ($product->price - $product->sale->amount) * (100 - $product->sale->percent) / 100;
            } else {
                $price = $product->price;
            }
            DB::table('shop_order_shop_product')->insert([
                'shop_order_id' => $order->id,
                'shop_product_id' => $product->id,
                'sale_id' => $product->sale_id,
                'qty' => $cartData[$product->id]['qty'],
                'price' => $price
            ]);
        }

        $request->session()->forget('cart');

        //send mail to buyer with order information
        Mail::to('asgarot72@gmail.com')->send(new OrderInfoMail($order));

        return redirect()->route('order.info')->with(['success' => 'Ваш заказ был успешно оформлен. Более подробную информацию вы можете просмотреть в личном кабинете.',
            'paymentMethod' => $order->pay_method, 'orderNumber' => $order->id, 'sum' => $order->sum, 'date' => $order->created_at]);
    }

    public function orderConfirm()
    {
        return view('user.confirm');
    }
}
