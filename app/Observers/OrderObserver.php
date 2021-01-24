<?php

namespace App\Observers;

use App\Mail\OrderReviewMail;
use App\Models\ShopOrder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderObserver
{
    /**
     * Обработка ПЕРЕД обновлением записи
     *
     * @param ShopOrder $order
     */
    public function updating(ShopOrder $order)
    {
        if ($order->status == 4) {

            $products = DB::table('shop_order_shop_product')
                ->where('shop_order_id', $order->id)
                ->get();

            $uuids = [];

            foreach ($products as $product) {
                $uuid = Str::uuid();
                $uuids[] = $uuid;

                $exist = DB::table('shop_order_shop_review')->where('order_id', $order->id)->where('product_id')->get();
                if ($exist->count() == 0) {
                    DB::table('shop_order_shop_review')->insert([
                        'id' => $uuid,
                        'order_id' => $order->id,
                        'product_id' => $product->shop_product_id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }

            }

            Mail::to('asgarot72@gmail.com')->send(new OrderReviewMail($uuids));
        }
    }
}
