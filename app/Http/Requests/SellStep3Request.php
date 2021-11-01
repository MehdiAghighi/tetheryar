<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellStep3Request extends FormRequest
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
            'shaba' => ['size:24' ],
            'cart' => ['size:16'],
            'bank' => ['required' ] ,

        ];
    }

    public function messages()
    {
        return [
            'shaba.numeric' => 'شماره شبا وارد شده باید فقط شامل عدد باشد. ',
            'shaba.size' => 'شبا وارد شده باید 24 رقم باشد.  ',

            'cart.numeric' => 'شماره کارت وارد شده باید فقط شامل عدد باشد. ',
            'cart.size' => 'شماره کارت باید 16 رقم باشد. ',

            'bank.required' => 'لطفا بانک مقصد را انتخاب نمایید .',

        ];
    }
}
