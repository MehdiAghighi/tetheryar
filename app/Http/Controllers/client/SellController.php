<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellStep1Request;
use App\Http\Requests\SellStep2Request;
use App\Http\Requests\SellStep3Request;
use App\Http\Requests\SellStep4Request;
use App\Http\Requests\SellStep5Request;
use App\Models\Authentication;
use App\Models\SellRequest;
use App\Models\TetherPrice;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

class SellController extends Controller
{
    public function step1Create()
    {
        return view('client.sell.step1',[
            'sellPrice' => TetherPrice::getSellTetherPrice(),
            'sellPricePersian' => TetherPrice::englishToPersianNumber(TetherPrice::getSellTetherPrice()),
        ]);
    }

    public function step1Store(SellStep1Request $request)
    {
        $tetherAmount = $request->get('tether_amount');
        session()->put('tetherAmount' , $tetherAmount);

        return redirect(route('client.sell.step2.create'));
    }

    public function step2Create()
    {
        if(!session()->exists('tetherAmount'))
        {
            return redirect(route('client.sell.step1.create'));
        }
        return view('client.sell.step2',[
            'tetherAmount' => number_format(session('tetherAmount') , 2),
            'authStatus' => Authentication::checkUserAuth(),
        ]);
    }

    public function step2Store(SellStep2Request $request)
    {
        $name = $request->get('name');
        $mobile = $request->get('mobile');
        $mail = $request->get('mail');

        session()->put('name' , $name);
        session()->put('mobile' , $mobile);
        session()->put('mail' , $mail);

        return redirect(route('client.sell.step3.create'));
    }

    public function step3Create()
    {
        if(!session()->exists('tetherAmount') or !session()->exists('mobile'))
        {
            return redirect(route('client.sell.step1.create'));
        }
        $sellRequest = SellRequest::query()->where('mobile' , session()->get('mobile'))->latest()->first();
        $tomanAmount = session('tetherAmount') * TetherPrice::getSellTetherPrice();
        return view('client.sell.step3',[
            'tetherAmount' => number_format(session('tetherAmount') , 2),
            'sellRequest' => $sellRequest,
            'tomanAmount' => $tomanAmount,
        ]);
    }

    public function step3Store(SellStep3Request $request)
    {
         $shaba = $request->get('shaba');
         $cart = $request->get('cart');
        $bank = $request->get('bank');

        session()->put('shaba' , $shaba);
        session()->put('cart' , $cart);
        session()->put('bank' , $bank);

        return redirect(route('client.sell.step4.create'));
    }

    public function step4Create()
    {
        if(!session()->exists('tetherAmount') or !session()->exists('shaba'))
        {
            return redirect(route('client.sell.step1.create'));
        }

        $sellPrice = TetherPrice::getSellTetherPrice();
        $tomanAmountPersian = TetherPrice::englishToPersianNumber($sellPrice * session('tetherAmount'));

        return view('client.sell.step4',[
            'tetherAmount' => number_format(session('tetherAmount') , 2),
            'name' => session()->get('name'),
            'mobile' => session()->get('mobile'),
            'shaba' => session()->get('shaba'),
            'cart' => session()->get('cart'),
            'mail' => session()->get('mail'),
            'bank' => session()->get('bank'),
            'tomanAmountPersian' => $tomanAmountPersian,
        ]);
    }

    public function step4Store(SellStep4Request $request)
    {
            $name = session()->get('name');
            $mobile = session()->get('mobile');
            $shaba = session()->get('shaba');
            $cart = session()->get('cart');
            $mail = session()->get('mail');
            $bank = session()->get('bank');
            $tetherAmount = session('tetherAmount') ;
            $tomanAmount = TetherPrice::getSellTetherPrice() * session('tetherAmount');
            $trackingCode= random_int(111111,999999);

            SellRequest::query()->create([
                'name' => $name ,
                'mobile' => $mobile ,
                'shaba' => $shaba ,
                'cart' => $cart ,
                'mail' => $mail ,
                'bank' => $bank ,
                'tetherSellPrice' => TetherPrice::getsellTetherPrice(),
                'tetherAmountSend' => $tetherAmount ,
                'tomanAmount' => $tomanAmount ,
                'trackingCode' => $trackingCode,
            ]);

            return redirect(route('client.sell.step5.create'));

    }

    public function step5Create()
    {
        if(!session()->exists('tetherAmount') or !session()->exists('mobile'))
        {
            return redirect(route('client.sell.step1.create'));
        }

        $sellRequest = SellRequest::query()->where('mobile' , session()->get('mobile'))->latest()->first();
        $wallet = Wallet::query()->get();

        return view('client.sell.step5' , [
            'wallet'=> $wallet,
            'sellRequest' => $sellRequest,
        ]);

    }

    public function step5Store(SellStep5Request $request)
    {
        if(!session()->exists('tetherAmount') or !session()->exists('mobile'))
        {
            return redirect(route('client.sell.step1.create'));
        }
        $sellRequest = SellRequest::query()->where('mobile' , session()->get('mobile'))->latest()->first();

        $sellRequest->update([

            'tether_type' => $request->get('tether_type'),
            'txid' => $request->get('txid'),
            'tetherStatus' => 'not approved' ,

        ]);

        sendTrackingCodeTether( session()->get('mobile') , $sellRequest->trackingCode);

         smsAdminSellRequest($sellRequest->trackingCode , '09123805021');
         smsAdminSellRequest($sellRequest->trackingCode , '09138802477');
        session()->forget('tetherAmount');
        session()->forget('mobile');
        session()->forget('shaba');
        session()->forget('bank');

        session()->put('trackingCode' , $sellRequest->trackingCode);



        return redirect(route('client.sell.result'));

    }

    public function result()
    {
        $trackingCode = session()->get('trackingCode');

        return view('client.sell.result' , [
           'trackingCode' => $trackingCode ,
        ]);
    }


    public function apiStepOne() {
        return response()->json( [
            'sellPrice' => TetherPrice::getSellTetherPrice(),
            'sellPricePersian' => TetherPrice::englishToPersianNumber(TetherPrice::getSellTetherPrice()),
            'buyPrice' => TetherPrice::getBuyTetherPrice(),
            'buyPricePersian' => TetherPrice::englishToPersianNumber(TetherPrice::getBuyTetherPrice()),
        ] );
    }

    public function apiCheckAuthStatus() {
        return response()->json([
            'tetherAmount' => number_format(session('tetherAmount') , 2),
            'authStatus' => Authentication::checkUserAuth(),
        ]);
    }

    public function apiGetLastSellRequestData(Request  $request) {
        $sellRequest = SellRequest::query()->where('mobile' , $request->get("mobile"))->latest()->first();
        $tomanAmount = $request->get("tetherAmount") * TetherPrice::getSellTetherPrice();
        return response()->json([
            'tetherAmount' => number_format($request->get("tetherAmount")),
            'sellRequest' => $sellRequest,
            'tomanAmount' => $tomanAmount,
        ]);
    }

    public function storeSellRequest( Request  $request ) {
        $validateData = $request->validate([
            "name" => [ "nullable" ],
            "mobile" => [ "required" ],
            "shaba" => [ "nullable" ],
            "cart" => [ "nullable" ],
            "mail" => [ "nullable" ],
            "bank" => [ "required" ],
            "tetherAmount" => [ "required" ]
        ]);
        $tomanAmount = TetherPrice::getSellTetherPrice() * $request->get("tetherAmount");
        $trackingCode= random_int(111111,999999);

        $sellRequest = SellRequest::query()->create([
            'name' => $request->get("name") ,
            'mobile' => $request->get("mobile"),
            'shaba' => $request->get("shaba") ,
            'cart' => $request->get("cart") ,
            'mail' => $request->get("mail") ,
            'bank' => $request->get("bank") ,
            'tetherSellPrice' => TetherPrice::getsellTetherPrice(),
            'tetherAmountSend' => $request->get("mobile") ,
            'tomanAmount' => $tomanAmount ,
            'trackingCode' => $trackingCode,
        ]);
        $wallet = Wallet::query()->get();

        return response()->json([
            "request" => $sellRequest,
            "wallet" => $wallet
        ], 201);
    }

    public function lastStep( Request $request ) {

        $request->validate([
            "mobile" => ["required"],
            "tether_type" => ["required"],
            "txid" => ["required"],
        ]);

        $sellRequest = SellRequest::query()->where('mobile' , $request->get("mobile") )->latest()->first();
        $sellRequest->update([
            'tether_type' => $request->get('tether_type'),
            'txid' => $request->get('txid'),
            'tetherStatus' => 'not approved' ,
        ]);

        /// TODO :: SET THESE BACK
        // sendTrackingCodeTether( $request->get("mobile") , $sellRequest->trackingCode);

        /// TODO :: SET THESE BACK
        //smsAdminSellRequest($sellRequest->trackingCode , '09123805021');
        //smsAdminSellRequest($sellRequest->trackingCode , '09138802477');


        return response()->json([
            "message" => ""
        ], 200);
    }
}
