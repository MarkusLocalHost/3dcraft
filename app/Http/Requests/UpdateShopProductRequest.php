<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShopProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id'  => 'required|integer',
            'product_name' => 'required|string',
            'content'      => 'required|string',
            'status'       => 'required|integer',
            'keywords'     => 'required|string',
            'description'  => 'required|string',
            'size'         => 'nullable|integer',
            'color'        => 'nullable|string',
            'brand'        => 'nullable|string',
            'price'        => 'required|numeric',
            'image'        => 'nullable|image',
            'hit'          => 'required|integer',
            'sale_id'      => 'nullable'
        ];
    }
}
