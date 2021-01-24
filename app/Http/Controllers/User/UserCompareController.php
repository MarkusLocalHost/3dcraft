<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShopCategory;
use App\Models\ShopProduct;
use Illuminate\Http\Request;

class UserCompareController extends Controller
{
    public function index($type)
    {
        if ($type === 'models') {
            $type_name = 'Моделей';
            $compareModelsData = session()->get('modelsCompare');

            if ($compareModelsData) {
                $products = ShopProduct::whereIn('id', $compareModelsData)->get();
            } else {
                $products = null;
            }

            return view('user.compare', compact('type_name', 'products'));
        } elseif ($type === 'plastik') {
            $type_name = 'Пластиков';
            $comparePlastikData = session()->get('plastikCompare');

            if ($comparePlastikData) {
                $products = ShopProduct::whereIn('id', $comparePlastikData)->get();
            } else {
                $products = null;
            }

            return view('user.compare', compact('type_name', 'products'));
        } else {
            return abort(404);
        }
    }

    public function addToCompare(Request $request)
    {
        $id = $request->input('product_id');
        $product = ShopProduct::where('status', '=', 1)->findOrFail($id);

        $categories_models = ShopCategory::whereIn('section_id', [1, 2])->select('id')->get()->toArray();
        foreach ($categories_models as $key => $value)
            $categories_models_list[] = $value['id'];
        $categories_plastik = ShopCategory::whereIn('section_id', [3])->select('id')->get()->toArray();
        foreach ($categories_plastik as $key => $value)
            $categories_plastik_list[] = $value['id'];

        if (in_array($product->category_id, $categories_models_list)) {
            if (count(session()->get('modelsCompare') ?? array()) < 3) {
                $compareModelsData = session()->get('modelsCompare') ?? array();
                $compareModelsData[] = $id;

                $request->session()->put('modelsCompare', $compareModelsData);
            } else {
                abort(404);
            }
        } elseif (in_array($product->category_id, $categories_plastik_list)) {
            if (count(session()->get('plastikCompare') ?? array()) < 3) {
                $comparePlastikData = session()->get('plastikCompare') ?? array();
                $comparePlastikData[] = $id;

                $request->session()->put('plastikCompare', $comparePlastikData);
            } else {
                abort(404);
            }
        } else {
            return abort(404);
        }
    }

    public function removeFromCompare(Request $request)
    {
        $id = $request->input('product_id');
        if (in_array($id, $request->session()->get('modelsCompare'))) {
            $compareModelsData = $request->session()->get('modelsCompare');
            foreach ($compareModelsData as $k => $v) {
                if ($v == $id) {
                    unset($compareModelsData[$k]);
                }
            }
            $request->session()->put('modelsCompare', $compareModelsData);
        } elseif (in_array($id, $request->session()->get('plastikCompare'))) {
            $comparePlastikData = $request->session()->get('plastikCompare');
            foreach ($comparePlastikData as $k => $v) {
                if ($v == $id) {
                    unset($comparePlastikData[$k]);
                }
            }
            $request->session()->put('plastikCompare', $comparePlastikData);
        } else {
            return abort(404);
        }
    }
}
