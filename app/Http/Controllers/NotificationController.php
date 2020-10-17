<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function productNotification(Product $product)
    {
            auth()->user()->unreadNotifications->markAsRead();
        return redirect(route('show',$product->id));
    }



    public function commentNotification(Product $product)
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect(route('show',$product->id));
    }


}
