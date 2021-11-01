<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellStep2Request extends FormRequest
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
            'name' => ['required' , 'max:50' , 'min:5' ],
            'mobile' => ['required' , 'regex:/(09)[0-9]{9}/'] ,
            'mail' => ['required' , 'email' ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'وارد کردن نام الزامی است .',
            'name.max' => 'نام حداکثر 50 کارکتر می تواند باشد ',
            'name.min' => 'نام حداقل باید 5 کارکتر باشد  ',

            'mobile.required' => 'لطفا شماره موبایل خود را وارد نمایید',
            'mobile.regex' => 'شماره موبایل وارد شده نامعتبر است ! ',

            'mail.required' => 'لطفا ایمیل خود را وارد نمایید',
            'mail.email' => 'ایمیل وارد شده نامعتبر است ! ',



        ];
    }
}
