<?php

namespace App\Http\Requests;

use App\Models\TetherPrice;
use Illuminate\Foundation\Http\FormRequest;

class BuyStep1Request extends FormRequest
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
            'toman_amount' => ['required','integer','max:50000000'],
            'tether_amount' => ['required' , 'numeric' , 'min:10'] ,

        ];
    }

    public function messages()
    {
        return [
            'toman_amount.required' => 'لطفا مبلغ مورد نظر به تومان را وارد کنید .',
            'toman_amount.integer' => 'لطفا مبلغ به تومان را به درستی وارد نمایید.',
            'toman_amount.max' => 'حداکثر مبلغ خرید 50 میلیون تومان می باشد .',

            'tether_amount.required' => 'مقدار تتر مورد نظر را وارد نمایید',
            'tether_amount.numeric' => 'مقدار تتر مورد نظر را به درستی وارد نمایید',
            'tether_amount.min' => 'حداقل تتر درخواستی 10 تتر می باشد',

        ];
    }
}
