<?php

namespace App\Providers;

use App\Models\Authentication;
use App\Models\UserWallet;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Guard $auth)
    {
        Paginator::useBootstrap();

        View::composer('*' , function ($view) use ($auth)
        {
           if(Auth::check())
            {
                $user_id=$auth->user()->id;

                $userCash=UserWallet::query()->where('user_id' , $user_id)->firstOrCreate([
                    'user_id' => $user_id
                ]);

                $checkUserAuth=Authentication::checkUserAuth();
                if($checkUserAuth=='approved')
                {
                    $user_firstName = $auth->user()->authRequest->first_name;
                    $user_lastName = $auth->user()->authRequest->last_name;
                    $fullName= $user_firstName.' '.$user_lastName;
                }else{
                    $fullName='پروفایل من';
                }

                $view->with([
                    'userCash' => $userCash,
                    'fullName' => $fullName,
                ]);
            }
        });

        Schema::defaultStringLength(191);

    }
}
