<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellStep5Request extends FormRequest
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
            'txid' => ['required' ],
        ];
    }

    public function messages()
    {
        return [
            'txid.required' => 'لطفا TXID را وارد نمایید .  ',
        ];
    }
}
