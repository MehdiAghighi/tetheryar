<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\client\AuthController;
use App\Http\Controllers\client\BuyController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\LoginController;
use App\Http\Controllers\client\SellController;

use App\Http\Controllers\GoogleV3CaptchaController;
use App\Http\Controllers\support\AuthenticationController;
use App\Http\Controllers\support\BuyRequestsController;
use App\Http\Controllers\support\DashboardController as SupportDashboardController;
use App\Http\Controllers\support\LoginController as SupportLoginController;
use App\Http\Controllers\support\PriceController;
use App\Http\Controllers\support\SellRequestsController;
use App\Http\Controllers\support\SendMessageController;
use App\Http\Controllers\support\UsersController;
use App\Http\Middleware\CheckPermission;
use App\Http\Middleware\SupportAuth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/linkstorage', function () {
//    Artisan::call('storage:link') ;
//});

Route::get('/api', [ApiController::class,'api'])->name('api');

Route::post('/buyPrice', [ApiController::class,'buyPrice'])->name('api.buyPrice');
Route::post('/sellPrice', [ApiController::class,'sellPrice'])->name('api.sellPrice');

Route::post('/captcha/load', [CaptchaController::class,'load'])->name('captcha.load');


Route::prefix('')->name('client.')->group(function (){

    Route::get('/', [HomeController::class,'index'])->name('index');

    Route::get('/login', [LoginController::class,'index'])->middleware('guest')->name('login');

    Route::post('/login/SendOtpCode', [LoginController::class,'SendOtpCode'])->middleware('guest')->name('login.SendOtpCode');

    Route::get('/login/otpCode/{user:mobile}', [LoginController::class,'otpCode'])->middleware('guest')->name('login.otpCode');

    Route::post('/login/verifyOtpCode/{user:mobile}', [LoginController::class,'verifyOtpCode'])->middleware('guest')->name('login.verifyOtpCode');

    Route::delete('/logout' , [AuthController::class , 'logout'])->name('logout');

    Route::get('/profile' , [HomeController::class,'profile'])->middleware('auth')->name('profile');

    Route::get('/buy-logs' , [HomeController::class,'buyLogs'])->middleware('auth')->name('profile.buyLogs');

    Route::get('/sell-logs' , [HomeController::class,'sellLogs'])->middleware('auth')->name('profile.sellLogs');

    Route::get('/referrals' , [HomeController::class,'referrals'])->middleware('auth')->name('profile.referrals');

    Route::get('/rules' , [HomeController::class,'rules'])->name('rules');

    Route::get('/about' , [HomeController::class,'about'])->name('about');

    Route::get('/contact-us' , [HomeController::class,'contactCreate'])->name('contact.create');

    Route::get('/education' , [HomeController::class,'education'])->name('education');

    Route::post('/contact-us/store' , [HomeController::class,'contactStore'])->name('contact.store');

    Route::get('/buy/step1', [BuyController::class,'step1Create'])->name('buy.step1.create');

    Route::post('/buy/step1/store', [BuyController::class,'step1Store'])->name('buy.step1.store');

    Route::get('/buy/step2', [BuyController::class,'step2Create'])->middleware('guest')->name('buy.step2.create');

    Route::post('/buy/step2/store', [BuyController::class,'step2Store'])->name('buy.step2.store');

    Route::get('/buy/step3/{user:mobile}', [BuyController::class,'step3Create'])->middleware('guest')->name('buy.step3.create');

    Route::post('/buy/step3/store/{user:mobile}', [BuyController::class,'step3Store'])->name('buy.step3.store');

    Route::get('/buy/step4', [BuyController::class,'step4Create'])->middleware('auth')->name('buy.step4.create');

    Route::post('/buy/step4/store', [BuyController::class,'step4Store'])->name('buy.step4.store');

    Route::get('/auth/check', [AuthController::class,'checkAuth'])->middleware('auth')->name('auth.check');

    Route::get('/auth/create', [AuthController::class,'create'])->middleware('auth')->name('auth.create');

    Route::post('/auth/store', [AuthController::class,'store'])->middleware('auth')->name('auth.store');

    Route::get('/auth/edit', [AuthController::class,'edit'])->middleware('auth')->name('auth.edit');

    Route::patch('/auth/update', [AuthController::class,'update'])->middleware('auth')->name('auth.update');

    Route::get('/buy/callback', [BuyController::class,'callback'])->name('buy.callback');

    Route::get('/buy/result/{buyResult}', [BuyController::class,'result'])->name('buy.result');

    Route::get('/sell/step1', [SellController::class,'step1Create'])->name('sell.step1.create');

    Route::post('/sell/step1/store', [SellController::class,'step1Store'])->name('sell.step1.store');

    Route::get('/sell/step2', [SellController::class,'step2Create'])->name('sell.step2.create');

    Route::post('/sell/step2/store', [SellController::class,'step2Store'])->name('sell.step2.store');

    Route::get('/sell/step3', [SellController::class,'step3Create'])->name('sell.step3.create');

    Route::post('/sell/step3/store', [SellController::class,'step3Store'])->name('sell.step3.store');

    Route::get('/sell/step4', [SellController::class,'step4Create'])->name('sell.step4.create');

    Route::post('/sell/step4/store', [SellController::class,'step4Store'])->name('sell.step4.store');

    Route::get('/sell/step5', [SellController::class,'step5Create'])->name('sell.step5.create');

    Route::post('/sell/step5/store', [SellController::class,'step5Store'])->name('sell.step5.store');

    Route::get('/sell/result', [SellController::class,'result'])->name('sell.result');

   });





