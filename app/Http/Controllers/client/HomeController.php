<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Authentication;
use App\Models\BuyRequest;
use App\Models\ContactUs;
use App\Models\Referral;
use App\Models\SellRequest;
use App\Models\TetherPrice;
use App\Models\User;
use App\Models\UserMessages;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.main.index',[

            'buyPrice' => TetherPrice::englishToPersianNumber(TetherPrice::getBuyTetherPrice()),
            'sellPrice' => TetherPrice::englishToPersianNumber(TetherPrice::getsellTetherPrice()),

        ]);
    }

    public function login()
    {
        return view('client.main.login');
    }

    public function profile()
    {
        $authentication=Authentication::query()->where('user_id', auth()->user()->id);
        if(!$authentication->exists())
        {
            $authCondition='no authentication';
            $invited_user_number=0;
        }else{

            $authCondition=$authentication->first();

            $invited_user_number=Referral::query()->where('sponsor_id' , auth()->user()->id)->count();
        }

        $authMessages=UserMessages::query()->where([
            ['user_id',auth()->user()->id],
            ['department' , 'auth'] ,
            ['Seen' , 0 ]
        ])->get();

        if ( request()->wantsJson() )
            return response()->json([
                'user' => auth()->user(),
                'authentication' => $authCondition,
                'authMessages' => $authMessages,
                'invitedUserNumber' => $invited_user_number,
            ]);

        return view('client.profile.index',[
            'user' => auth()->user(),

            'authentication' => $authCondition,
            'authMessages' => $authMessages,
            'invitedUserNumber' => $invited_user_number,
        ]);
    }

    public function rules()
    {
        return view('client.main.rules');
    }

    public function about()
    {
        return view('client.main.about');
    }


    public function contactCreate()
    {
        return view('client.main.contact');
    }

    public function contactStore(ContactRequest $request)
    {
        ContactUs::query()->create([
            'name' => $request->get('name'),
            'mobile' => $request->get('mobile'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);

        return redirect()->back()->with('success-message' , 'پیام شما با موفقیت ارسال شد!منتظر تماس همکاران ما باشید.با تشکر');
    }

    public function education()
    {
        return view('client.main.education');
    }

    public function buyLogs()
    {
        if ( request()->wantsJson() )
            return response([
                "buyRequests" => BuyRequest::query()->where('user_id' , auth()->user()->id)->where('payment_status' , 'OK')->orderByDesc('id')->paginate(15),
            ]);
        return view('client.profile.buy-Logs',[
            'buyRequests' => BuyRequest::query()->where('user_id' , auth()->user()->id)->where('payment_status' , 'OK')->orderByDesc('id')->paginate(15),
        ]);
    }

    public function sellLogs()
    {
        if ( request()->wantsJson() )
            return response([
                "sellRequests" => SellRequest::query()->where('mobile' , auth()->user()->mobile)->whereNotNull('txid')->orderByDesc('id')->paginate(15),
            ]);
        return view('client.profile.sell-Logs',[
            'sellRequests' => SellRequest::query()->where('mobile' , auth()->user()->mobile)->whereNotNull('txid')->orderByDesc('id')->paginate(15),
        ]);

    }

    public function referrals()
    {
        if ( request()->wantsJson() )
            return response([
                "Referrals" => Referral::query()->where('sponsor_id' , auth()->user()->id)->orderByDesc('id')->get(),
            ]);

        return view('client.profile.referrals',[
                'Referrals' => Referral::query()->where('sponsor_id' , auth()->user()->id)->orderByDesc('id')->get(),
        ]);
    }
}
