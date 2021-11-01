<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TetherPrice extends Model
{
    use HasFactory;
    protected $guarded=[];


    public static function getBuyTetherPrice()
    {
        $tetherPrice = self::query()->orderBy('id', 'DESC')->first();
        $buyPrice = $tetherPrice->buyPrice;

        return $buyPrice;

    }

    public static function getsellTetherPrice()
    {
        $tetherPrice = self::query()->orderBy('id', 'DESC')->first();
        $sellPrice = $tetherPrice->sellPrice;

        return $sellPrice;

    }

    public static function englishToPersianNumber($number)
    {
        return strtr($number, array('0'=>'۰', '1'=>'۱', '2'=>'۲', '3'=>'۳', '4'=>'۴', '5'=>'۵', '6'=>'۶', '7'=>'۷', '8'=>'۸', '9'=>'۹'));

    }


}
