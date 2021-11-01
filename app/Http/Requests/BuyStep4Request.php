<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyStep4Request extends FormRequest
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
            'rules' => ['required' ],
            'walletAddress' => ['required' , 'min:25' , 'max:90' ,'alpha_num'],
            'tether_type' => ['required' , 'in:ERC-20,TRC-20'  ],

            'captcha' => ['required' , 'captcha'] ,
        ];
    }

    public function messages()
    {
        return [
            'rules.required' => 'شرایط و قوانین را تایید نکرده اید ! ',

            'walletAddress.required' => 'آدرس ولت را وارد کنید !  ',
            'walletAddress.min' => 'آدرس ولت حداقل باید 25 کارکتر باشد',

            'tether_type.required' => 'شبکه مورد نظر را انتخاب کنید',
            'tether_type.in' => 'شبکه انتخابی معتبر نمی باشد',

            'captcha.required' => 'وارد کردن کپچا الزامی است ',
            'captcha.captcha' => 'عبارت امنیتی وارد شده صحیح نمی باشد ',

        ];
    }
}
