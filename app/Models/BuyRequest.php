<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyRequest extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function authentication()
    {
        return $this->belongsTo(Authentication::class , 'user_id' , 'user_id');
    }

}
