<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   protected $fillable = ['name','user_id'];


   public function user(){
       return $this->belongsTo(User::class);
   }

    public function products(){

       return $this->belongsToMany(Product::class);
    }




}
