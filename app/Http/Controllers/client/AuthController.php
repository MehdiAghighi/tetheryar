<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\AuthUpdateRequest;
use App\Models\Authentication;
use App\Models\Referral;
use App\Models\User;
use App\Models\UserMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function checkAuth()
    {
        $checkUserAuth = Authentication::checkUserAuth();
        if ( request()->wantsJson() )
            return response()->json([
                "authStatus" => $checkUserAuth
            ]);
        if( $checkUserAuth == 'not auth' )
        {
            return redirect(route('client.auth.create'));
        } elseif( $checkUserAuth == 'rejected' or $checkUserAuth == 'not approved' )
        {
            return redirect(route('client.auth.edit'));
        } else
        {
            return redirect(route('client.buy.step4.create'));
        }
    }

    public function logout()
    {
        if ( request()->wantsJson() ) {
            request()->user("sanctum")->currentAccessToken()->delete();
            return response()->json([
                "message" => "با موفقیت خارج شدید."
            ]);
        }

        auth()->logout();
        return redirect(route('client.index'));
    }



    public function create()
    {
        $exists = Authentication::query()->where('user_id', auth()->user()->id);
        if ( request()->wantsJson() )
            return response()->json([
                "exists" => $exists->exists(),
                "auth" => $exists->first()
            ]);
        if( $exists->exists() )
        {
            return redirect(route('client.auth.edit'));
        }
       return view('client.auth.create');
    }

    public function store(AuthRequest $request)
    {
//        if ( $request->wantsJson() ) {
//            $base64String = $request->get("nationalCardBase64");
//            $memeType = "";
//            if ( strpos($base64String, "data:image/png;base64") !== false )
//                $memeType = "png";
//            elseif ( strpos($base64String, "data:image/jpeg;base64") !== false )
//                $memeType = "jpeg";
//            elseif ( strpos($base64String, "data:image/jpg;base64") !== false )
//                $memeType = "jpg";
//            $image = str_replace("data:image/{$memeType};base64," , '', $base64String);
//            $image = str_replace(' ', '+', $image);
//            $imageName = Str::random(10) . '.' . $memeType;
//            $file = File::put(storage_path("app"). '/public/images/' . $imageName, base64_decode($image));
//            $pathNationalCardPicture = 'public/images/' . $imageName;
//        }
//        else
        $pathNationalCardPicture = $request->file('nationalCardPicture')->storeAs('public/images',
            $request->file('nationalCardPicture')->hashName());

        if( $request->get('identifier_code') != null )
        {
            $sponsor_query=User::query()->where('identifier_code' , $request->get('identifier_code'));
            if ( $sponsor_query->count() > 0 )
            {
                $sponsor_query = $sponsor_query->first();
                $sponsor_id = $sponsor_query->id;
                Referral::query()->create([
                    'user_id'=> auth()->user()->id,
                    'sponsor_id'=>$sponsor_id
                ]);
            } else
            {
                if ( request()->wantsJson() )
                    return response()->json([
                        "message" => "کد معرف معتبر نمی‌باشد !"
                    ], 422);
                return back()->withErrors('کد معرف معتبر نمی باشد ! ' );
            }
        }

            Authentication::query()->create([
                'user_id'=> auth()->user()->id,
                'first_name'=>$request->get('first_name'),
                'last_name'=>$request->get('last_name'),
                'nationalCode'=>$request->get('nationalCode'),
                'phoneNumber'=>$request->get('phoneNumber'),
                'callTime'=>$request->get('callTime'),
                'nationalCardPicture'=>$pathNationalCardPicture,
            ]);

        smsAdminNewAuth(auth()->user()->id , '09123805021');
        smsAdminNewAuth(auth()->user()->id , '09138802477');

        if ( request()->wantsJson() )
            return response()->json([
                "message" => "لطفا منتظر تماس باشید."
            ]);
        return redirect(route('client.auth.edit'));
    }

    public function edit()
    {
        $authCondition = Authentication::query()->where('user_id', auth()->user()->id);
        if( ! $authCondition->exists() )
        {
            if ( request()->wantsJson() )
                return response()->json([
                    "message" => "not created."
                ]);
            return redirect(route('client.auth.create'));
        } else {
            $authMessages = UserMessages::query()->where([
                ['user_id',auth()->user()->id],
                ['department' , 'auth'] ,
                ['Seen' , 0 ]
            ])->get();

            $authCondition = $authCondition->first();
        }
        if ( request()->wantsJson() )
            return response()->json([
                'authCondition' => $authCondition,
                'authMessages' => $authMessages,
            ]);
        return view('client.auth.edit',[
            'authCondition' => $authCondition,
            'authMessages' => $authMessages,
        ]);
    }

    public function update(AuthUpdateRequest $request)
    {
        $auth = Authentication::query()->where('user_id' , auth()->user()->id)->first();
        $nationalCardPicture = $auth->nationalCardPicture;

        if( $request->hasFile('nationalCardPicture') )
        {
            $nationalCardPicture = $request->file('nationalCardPicture')->storeAs('public/images', $request->file('nationalCardPicture')->hashName());
        }
        $auth->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'nationalCode' => $request->get('nationalCode'),
            'phoneNumber' => $request->get('phoneNumber'),
            'callTime' => $request->get('callTime'),
            'status' => 'not approved',
            'nationalCardPicture' => $nationalCardPicture,
        ]);

        smsAdminNewAuth(auth()->user()->id , '09123805021');
        smsAdminNewAuth(auth()->user()->id , '09138802477');

        if ( request()->wantsJson() )
            return response()->json([
                "message" => "احراز هویت جدید انجام شد ، لطفا منتظر تماس باشید.",
                "auth" => $auth
            ]);
        return redirect(route('client.auth.edit'));
    }
}
