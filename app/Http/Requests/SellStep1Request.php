<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellStep1Request extends FormRequest
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
//            'toman_amount' => ['required','integer','max:50000000'],
            'tether_amount' => ['required' , 'numeric' , 'min:10' ,'max:100000'] ,
        ];
    }

    public function messages()
    {
        return [
            'tether_amount.required' => 'مقدار تتر مورد نظر را وارد نمایید',
            'tether_amount.numeric' => 'مقدار تتر مورد نظر را به درستی وارد نمایید',
            'tether_amount.min' => 'حداقل تتر قابل فروش 10 تتر می باشد',
            'tether_amount.max' => 'حداکثر تتر قابل فروش 100,000 تتر می باشد',

        ];
    }
}
