<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name' , 'description','user_id','image_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function image(){
        return $this->belongsTo(Image::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

}
