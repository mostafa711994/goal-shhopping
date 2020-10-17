<?php

namespace App\Http\Controllers;

use App\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){




        $data = $request->all();
        $username = $data['username'];
        $password = $data['password'];

        if (Auth::attempt(['username'=>$username,'password'=>$password])){



            session()->flash('success','you logged in successfully');


            return redirect(route('home'));
        }else{

            return redirect(route('login'))->withErrors(['username or password not correct']);
        }
    }



    public function logout(){
        Auth::logout();
        Cart::destroy();
        return redirect(route('home'));
    }
}


