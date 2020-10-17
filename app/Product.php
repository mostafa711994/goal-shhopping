<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name','selling_price','buying_price','discount','description','details','is_available','user_id','category_id','image_id','trend','best_seller'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){

        return $this->belongsToMany(Tag::class);
    }

    public function image(){
        return $this->belongsTo(Image::class);
    }

    public function hasTag($tagId){

        return in_array($tagId,$this->tags->pluck('id')->toArray());
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
