<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopProductRequest;
use App\Http\Requests\UpdateShopProductRequest;
use App\Models\ShopCategory;
use App\Models\ShopProduct;
use App\Models\ShopProductPhoto;
use App\Models\ShopSale;
use App\Models\ShopSection;
use Illuminate\Http\Request;

class ShopProductController extends Controller
{
    public function index()
    {
        $products = ShopProduct::with('category')->get();

        return view('admin.shop_products.index', compact('products'));
    }

    public function create()
    {
        $sales = ShopSale::where('status', '=', 1)->pluck('title', 'id');
        $categories = ShopCategory::all();

        return view('admin.shop_products.create', compact('categories', 'sales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreShopProductRequest $request)
    {
        $data = $request->all();

        $data['image'] = ShopProduct::uploadImage($request);
        $post = ShopProduct::create($data);

        return redirect()->route('shop_products.index')->with('success', 'Товар добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $sales = ShopSale::where('status', '=', 1)->pluck('title', 'id');
        $product = ShopProduct::find($id);
        $categories = ShopCategory::pluck('title', 'id')->all();

        return view('admin.shop_products.edit', compact('product', 'categories', 'sales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateShopProductRequest $request, $id)
    {
        $product = ShopProduct::find($id);
        $data = $request->all();

        if ($file = ShopProduct::uploadImage($request, $product->image)) {
            $data['image'] = $file;
        }

        $product->update($data);

        return redirect()->route('shop_products.index')->with('success', 'Товар изменен');
    }

    public function destroy($id)
    {
        $result = ShopProduct::destroy($id);

        return redirect()->route('shop_products.index')->with('success', 'Товар удален');
    }

    public function trash()
    {
        $deleted_products = ShopProduct::onlyTrashed()->with('category')->get();

        return view('admin.shop_products.trash', compact('deleted_products'));
    }

    public function restore($id)
    {
        $restored_product = ShopProduct::withTrashed()->find($id)->restore();

        return redirect()->route('shop_products.index')->with('success', 'Товар восстановлен');
    }

    public function gallery_view($product_id)
    {
        $gallery = ShopProductPhoto::where('product_id', '=', $product_id)->get();

        return view('admin.shop_products.gallery', compact('gallery', 'product_id'));
    }

    public function gallery_add_photo($id)
    {
        $product = ShopProduct::find($id);

        return view('admin.shop_products.gallery_add_photo', compact('product'));
    }

    public function gallery_save_photo($product_id, Request $request)
    {
        if($request->hasfile('images'))
        {
            $folder = date('Y-m-d');

            foreach($request->file('images') as $key => $file)
            {
                $image = $file->store("images/{$folder}");

                $insert[$key]['product_id'] = $product_id;
                $insert[$key]['image'] = $image;
            }
        }

        ShopProductPhoto::insert($insert);

        return redirect()->route('shop_products.gallery_view', ['shop_product' => $product_id])->with('success', 'Фото добавлены в галерею товара');
    }

    public function gallery_delete_photo($product_id, Request $request)
    {
        $result = ShopProductPhoto::where('image', '=', $request->input('image'))->delete();

        return redirect()->route('shop_products.gallery_view', ['shop_product' => $product_id])->with('success', 'Изображение удалено');
    }
}
