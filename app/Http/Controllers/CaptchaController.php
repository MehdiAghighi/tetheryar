<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function load(Request $request)
    {
        return response([
            'imageSource' => captcha_src()
        ]);
    }
}
