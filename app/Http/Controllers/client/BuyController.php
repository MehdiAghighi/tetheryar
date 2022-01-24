<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\BuyStep1Request;
use App\Http\Requests\BuyStep2Request;
use App\Http\Requests\BuyStep3Request;
use App\Http\Requests\BuyStep4Request;
use App\Models\Authentication;
use App\Models\BuyRequest;
use App\Models\TetherPrice;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class BuyController extends Controller
{
    public function step1Create()
    {

        return view('client.buy.step1',[
            'buyPrice' => TetherPrice::getBuyTetherPrice(),
            'buyPricePersian' => TetherPrice::englishToPersianNumber(TetherPrice::getBuyTetherPrice()),

        ]);
    }

    public function step1Store(BuyStep1Request $request)
    {
       $tomanAmount = $request->get('toman_amount');

       $tetherBuyPrice = TetherPrice::getBuyTetherPrice();

       $tetherAmount=$tomanAmount/$tetherBuyPrice ;

       session()->put('tetherAmount' , $tetherAmount);

       return redirect(route('client.buy.step2.create'));
    }

    public function step2Create()
    {
        if(!session()->exists('tetherAmount'))
        {
            return redirect(route('client.buy.step1.create'));
        }
        if(!auth()->guest())
        {
            return redirect(route('client.auth.check'));
        }

       return view('client.buy.step2',[
           'tetherAmount' => number_format(session('tetherAmount') , 2),
       ]);
    }

    public function step2Store(BuyStep2Request $request)
    {
        $user = User::generateOtp($request);

        return redirect(route('client.buy.step3.create' , $user));

    }

    public function step3create(User $user)
    {
        if(!session()->exists('tetherAmount'))
        {
            return redirect(route('client.buy.step1.create'));
        }


        return view('client.buy.step3',[
            'user' => $user ,
        ]);
    }

    public function step3store(BuyStep3Request $request , User $user)
    {

        if(! Hash::check($request->get('otpCode'), $user->password ))
        {
            return back()->withErrors(['otpCode' => 'کد وارد شده صحیح نیست ! ']);
        }
//        if($request->get('otpCode')!=$user->password )
//        {
//            return back()->withErrors(['otpCode' => 'کد وارد شده صحیح نیست ! ']);
//        }
       else{
            auth()->login($user);

            return redirect(route('client.auth.check' , $user));
        }
    }

    public function step4Create()
    {

        if(!session()->exists('tetherAmount'))
        {
            return redirect(route('client.buy.step1.create'));
        }
        $checkUserAuth=Authentication::checkUserAuth();
        if($checkUserAuth != 'approved')
        {
            return redirect(route('client.auth.edit'));
        }

        $buyPrice= TetherPrice::getBuyTetherPrice();
        $tomanAmount = TetherPrice::englishToPersianNumber($buyPrice * session('tetherAmount'));
            return view('client.buy.step4',[
            'tetherAmount' => number_format(session('tetherAmount') , 2),
            'tomanAmount' => $tomanAmount,
        ]);
    }

    public function step4store(Buystep4Request $request)
    {

        $tomanAmount= intval(session('tetherAmount') * TetherPrice::getBuyTetherPrice());

        $buyRequest = BuyRequest::query()->create([
            'user_id' => auth()->user()->id,
            'tetherAmount' => session('tetherAmount'),
            'tomanAmount'=> $tomanAmount,
            'tetherBuyPrice' => TetherPrice::getBuyTetherPrice() ,
            'tether_type' => $request->get('tether_type'),
            'walletAddress' => $request->get('walletAddress'),
        ]);

        $invoice = new Invoice;
        $invoice ->amount($tomanAmount);

//        session()->forget('tetherAmount');

        return Payment::purchase($invoice , function ($driver , $transactionId) use ($buyRequest)
        {
            $buyRequest->update([
                'transaction_id' => $transactionId
            ]);
        })->pay()->render();
    }


    public function callback(Request $request)
    {
        $buyRequest = BuyRequest::query()->where('transaction_id' , $request->get('Authority'))->first();

        $buyRequest->update([
            'payment_status' => $request->get('Status')
        ]);
        if($request->get('Status') == 'OK')
        {

            sendTrackingCode($buyRequest->user->mobile , substr($request->get('Authority') , -6) );
            smsAdminBuyRequest(substr($request->get('Authority') , -6) , '09138802477');
              smsAdminBuyRequest(substr($request->get('Authority') , -6) , '09123805021');
        }
       auth()->login($buyRequest->user);
        return redirect(route('client.buy.result' , $buyRequest));
    }

    public function result(BuyRequest $buyResult)
    {
       if($buyResult->user_id != auth()->user()->id)
       {
           abort(403);
       }
        return view('client.buy.result',[
            'result' =>$buyResult
        ]);
    }

    public function apiStoreBuyRequest( Request $request ) {
        $validatedData = $request->validate([
            "tetherAmount" => [ "required" ],
            'walletAddress' => ['required' , 'min:25' , 'max:90' ,'alpha_num'],
            'tether_type' => ['required' , 'in:ERC-20,TRC-20'  ],
            'captcha' => ['required', 'captcha_api:' . request('key') . ',math'] ,
        ]);

        $tomanAmount= intval($validatedData["tetherAmount"] * TetherPrice::getBuyTetherPrice());

        $buyRequest = BuyRequest::query()->create([
            'user_id' => auth("sanctum")->user()->id,
            'tetherAmount' => $validatedData["tetherAmount"],
            'tomanAmount'=> $tomanAmount,
            'tetherBuyPrice' => TetherPrice::getBuyTetherPrice() ,
            'tether_type' => $request->get('tether_type'),
            'walletAddress' => $request->get('walletAddress'),
        ]);

        $invoice = new Invoice;
        $invoice ->amount($tomanAmount);

        /// TODO : CHANGE THIS URL
        $payment = Payment::callbackUrl( env("APP_URL") . "/api/buy/callback?webapp={$request->header('X-IS-WEBAPP', false)}" )->purchase($invoice , function ($driver , $transactionId) use ($buyRequest)
        {
            $buyRequest->update([
                'transaction_id' => $transactionId
            ]);
        })->pay();

        return response()->json([
            "buy_request" => $buyRequest,
            "payment_address" => $payment->getAction()
        ]);
    }

    public function apiCallback(Request $request)
    {
        $buyRequest = BuyRequest::query()->where('transaction_id' , $request->get('Authority'))->first();

        $buyRequest->update([
            'payment_status' => $request->get('Status')
        ]);
        if($request->get('Status') == 'OK')
        {
            sendTrackingCode($buyRequest->user->mobile , substr($request->get('Authority') , -6) );
            smsAdminBuyRequest(substr($request->get('Authority') , -6) , '09138802477');
            smsAdminBuyRequest(substr($request->get('Authority') , -6) , '09123805021');
        }
        $isWebApp = (bool) $request->query("webapp", false);
        if ( $isWebApp )
            return redirect(env("WEBAPP_PAYMENT_CALLBACK"));
        else
            return redirect()->route("api.callback", [ "status" => $request->get('Status') == 'OK' ? "successful" : "failed" ]);
    }

}
