<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Message;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.index')
            ->with('user',User::all())
            ->with('category',Category::all())
            ->with('product',Product::all())
            ->with('order',Order::all())
            ->with('message',Message::all())
            ->with('comment', Comment::all());
    }
}
