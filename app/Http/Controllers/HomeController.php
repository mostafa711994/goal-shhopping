<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('user.index')
            ->with('categories',Category::all())
            ->with('products',Product::all());
    }
}
