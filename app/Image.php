<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{

    public $fillable = ['name','type'];


    public function users(){
        return $this->hasMany(User::class);
    }


}
