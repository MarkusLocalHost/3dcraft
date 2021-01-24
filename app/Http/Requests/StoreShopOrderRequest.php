<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopOrderRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'promocode_id' => 'nullable|integer',
            'delivery_id'  => 'required|integer',
            'pay_method'   => 'required|string',
            'sum'          => 'required|numeric',
            'status'       => 'required|integer',
            'note'         => 'nullable|string',
        ];
    }
}
