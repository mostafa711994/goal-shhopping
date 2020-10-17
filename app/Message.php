<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['name','email','subject','body','user_id'];


    public function user(){
        return $this->belongsTo(User::class);
    }

}
