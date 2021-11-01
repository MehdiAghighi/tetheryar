<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\VerifyOtpCodeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        if ( request()->wantsJson() )
            return response()->json([
                "captcha" => captcha_src()
            ]);
        return view('client.login.index');
    }

    public function SendOtpCode(LoginRequest $request)
    {
        $user = User::generateOtp($request);

        if ( $request->wantsJson() )
            return response()->json([
                "message" => "کد با موفقیت ارسال شد.",
            ]);
        return redirect(route('client.login.otpCode' , $user));
    }

    public function otpCode(User $user)
    {
        return view('client.login.otpCode',[
            'user' => $user ,
        ]);
    }

    public function verifyOtpCode(VerifyOtpCodeRequest $request , User $user)
    {
        if(! Hash::check($request->get('otpCode'), $user->password ))
        {
            if ( $request->wantsJson() )
                return response()->json([
                    "message" => "کد وارد شده صحیح نیست !"
                ], 422);
            return back()->withErrors(['otpCode' => 'کد وارد شده صحیح نیست ! ']);
        }
        else{
            if ( $request->wantsJson() ) {
                $token = $user->createToken(Str::limit( $request->userAgent(), 160 ));
                return response()->json([
                    "message" => "با موفقیت وارد شدید!",
                    "token" => $token->plainTextToken
                ]);
            }
            auth()->login($user);
            return redirect(route('client.profile'));
        }
    }
}
