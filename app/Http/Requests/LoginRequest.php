<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LoginRequest extends FormRequest
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
            'mobile' => ['required' , 'regex:/(09)[0-9]{9}/' , 'size:11'],
            'captcha' => ['required' , request()->wantsJson() ?  'captcha_api:' . request('key') . ',math' : 'captcha'] ,
        ];
    }

    public function messages()
    {
        return [
            'mobile.required' => 'لطفا شماره موبایل خود را وارد نمایید',
            'mobile.regex' => 'شماره موبایل وارد شده نامعتبر است ! ',
            'mobile.size' => 'شماره موبایل وارد شده نامعتبر است ! ',

            'captcha.required' => 'وارد کردن کپچا الزامی است ',
            'captcha.captcha' => 'عبارت امنیتی وارد شده صحیح نمی باشد ',
            'captcha.captcha_api' => 'عبارت امنیتی وارد شده صحیح نمی باشد ',

        ];
    }


}
