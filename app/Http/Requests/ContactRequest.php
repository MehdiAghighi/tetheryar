<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => ['required' , 'min:5'],
            'mobile' => ['required' , 'regex:/(09)[0-9]{9}/'],
            'subject' => ['required' , 'min:5' , 'max:100'],
            'message' => ['required' , 'min:5' , 'max:1000'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'وارد کردن نام الزامی است . ',

            'mobile.required' => 'لطفا شماره موبایل خود را وارد نمایید',
            'mobile.regex' => 'شماره موبایل وارد شده نامعتبر است ! ',

            'subject.required' => 'وارد کردن موضوع الزامی است. ',
            'subject.min' => 'موضوع حداقل باید 5 کارکتر باشد . ',
            'subject.max' => 'موضوع حداکثر می تواند 100 کارکتر باشد . ',

            'message.required' => 'وارد کردن پیام الزامی است. ',
            'message.min' => 'پیام حداقل باید 5 کارکتر باشد . ',
            'message.max' => 'پیام حداکثر می تواند 1000 کارکتر باشد . ',

        ];
    }
}
