<?php

namespace App\Http\Requests;

use App\Rules\Nationalcode;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'first_name' => ['required', 'max:50' , 'min:2' ],
            'last_name' => ['required' ,'max:50' , 'min:3' ],
            'nationalCode' => ['required' ,'size:10','unique:authentications,nationalCode' , new Nationalcode ],
            'phoneNumber' => ['required' ],
            'callTime' => ['required' , 'in:9-11,11-13,13-15,15-17,17-19,19-21,21-23' ],
            'nationalCardPicture' => [ !request()->wantsJson() ? 'required' : 'nullable' ,'mimes:png,jpg,jpeg,mpeg,svg','max:2048' ],
            'nationalCardBase64' => [ request()->wantsJson() ? 'required' : 'nullable', 'string' ],
            'captcha' => ['required', request()->wantsJson() ?  'captcha_api:' . request('key') . ',math' : 'captcha'] ,
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'وارد کردن نام الزامی است .',
            'first_name.persian_alpha' => 'نام باید به زبان فارسی وارد شود',

            'last_name.required' => 'وارد کردن نام خانوادگی الزامی است .',
            'first_name.max' => 'نام حداکثر 50 کارکتر می تواند باشد ',
            'first_name.min' => 'نام حداقل باید 5 کارکتر باشد  ',

            'last_name.max' => 'نام حداکثر 50 کارکتر می تواند باشد ',
            'last_name.min' => 'نام حداقل باید 5 کارکتر باشد  ',
            'last_name.persian_alpha' => 'نام باید به زبان فارسی وارد شود',

            'nationalCode.required' => 'وارد کردن کدملی الزامی است .',
            'nationalCode.size' => 'کدملی باید 10 کارکتر باشد  ',
            'nationalCode.unique' => 'کدملی وارد شده قبلا استفاده شده است . ',

            'phoneNumber.required' => 'وارد کردن شماره تماس ثابت الزامی است .',

            'callTime.required' => 'وارد کردن بازه زمانی جهت تماس با شماره ثابت الزامی است .',
            'phoneNumber.in' => 'بازه زمانی معتبر نیست ! ',

            'nationalCardPicture.required' => 'وارد کردن تصویر کارت ملی الزامی است .',
            'nationalCardPicture.mimes' => 'فرمت تصویرکارت ملی معتبر نیست !',
            'nationalCardPicture.max' => 'تصویر کارت ملی باید حداکثر 2 مگابایت باشد .',

            'captcha.required' => 'وارد کردن کپچا الزامی است ',
            'captcha.captcha' => 'عبارت امنیتی وارد شده صحیح نمی باشد ',
            'captcha.captcha_api' => 'عبارت امنیتی وارد شده صحیح نمی باشد ',

//            'identifier_code.exists' => 'کد معرف معتبر نمی باشد',

        ];
    }
}
