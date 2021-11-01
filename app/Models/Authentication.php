<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authentication extends Model
{
    use HasFactory;
    protected $guarded;


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public static function checkUserAuth()
    {
        if( auth()->check() )
        {
            $userVerifyAuth = self::query()->where('user_id' , auth()->user()->id);
            if( $userVerifyAuth->exists() )
            {
                $userVerifyAuth=$userVerifyAuth->first();
                if( $userVerifyAuth['status'] =='approved' ) {
                    return 'approved';
                } elseif( $userVerifyAuth['status'] =='not approved' ) {
                    return 'not approved';
                } elseif($userVerifyAuth['status'] =='rejected' ) {
                    return 'rejected';
                }
            } else
            {
                return 'not auth';
            }
        }

    }

    public function BuyRequests()
    {
        $this->hasMany(BuyRequest::class , 'user_id');
    }
}
