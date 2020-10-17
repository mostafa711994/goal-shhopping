<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name','phone_number','address','note','user_id','cart_content','country','zip'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
