<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellStep4Request extends FormRequest
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
            'captcha' => ['required' , 'captcha'] ,

        ];
    }

    public function messages()
    {
        return [
            'rules.required' => 'شرایط و قوانین را تایید نکرده اید ! ',
            'captcha.required' => 'وارد کردن کپچا الزامی است ',
            'captcha.captcha' => 'عبارت امنیتی وارد شده صحیح نمی باشد ',

        ];
    }
}
