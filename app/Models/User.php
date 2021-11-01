<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use \App\Models\BuyRequest ;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'mobile',
        'password',
        'role_id',
        'identifier_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this -> belongsTo(Role::class);
    }

    public static function generateOtp(Request $request)
    {
        $otp = random_int(11111,99999);

        $userQuery = User::query()->where('mobile' , $request->get('mobile'));

        if($userQuery->exists())
        {
            $user = $userQuery->first();

            $user ->update([
                'password' => bcrypt($otp),
//                'password' => $otp,
            ]);

        } else {
            $identifier_code = random_int(1111111,9999999);

            $user = User::query()->create([
                'mobile'=> $request-> get('mobile'),
                'role_id'=> Role::findByTitle('user')->id ,
//                'password' => $otp,
                'password' => bcrypt($otp),
                'identifier_code' => $identifier_code,
            ]);
        }

        sendOtpCode($request-> get('mobile') , $otp);
        /// TODO : REMOVE THIS FROM HERE ( VERY IMPORTANT )
        Log::info($otp);
        return $user;
    }

    public function userMessages()
    {
        $this->hasMany(UserMessages::class);
    }

    public function buyRequests()
    {
        return $this->hasMany(BuyRequest::class);
    }

    public function authRequest()
    {
        return $this->hasOne(Authentication::class);
    }

    public function wallet()
    {
        return $this->hasOne(UserWallet::class);
    }

    public function auth()
    {
        return $this->hasOne(Authentication::class);
    }


}
