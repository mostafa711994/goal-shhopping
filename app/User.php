<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [

        'username', 'email', 'password','first_name','last_name','address','phone_number','api_token','role','image_id'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function image(){
        return $this->belongsTo(Image::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function isAdmin(){

        return $this->role === 'admin';
    }

    public function tags(){
        return $this->hasMany(Tag::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }


}
