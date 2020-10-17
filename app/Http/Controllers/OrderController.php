<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\SuccessfulPurchase;
use App\Order;
use App\Product;
use App\User;
use Cartalyst\Stripe\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('user.cart.order')->with('categories',Category::all());
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'address' => 'required',
            'country' => 'required',
            'zip' => 'required',
        ]);



        Order::create([
            'name' =>$request->name,
            'phone_number' =>$request->phone_number,
            'address'=>$request->address,
            'user_id' =>auth()->user()->id,
            'country' =>$request->country,
            'zip' => $request->zip,
            'cart_content'=>serialize(session()->get('cart')),
            'note' =>$request->note

        ]);

        session()->flash('success','Order created successfully');


        return redirect(route('create-payment'));

    }


    public function show(Order $order)
    {
        //
    }


    public function edit(Order $order)
    {
        //
    }


    public function update(Request $request, Order $order)
    {
        //
    }


    public function destroy(Order $order)
    {
        //
    }

    public function payment(){

       return view('user.cart.payment')->with('categories',Category::all());
    }




    public function pay(Request $request){

        $stripe = new Stripe('sk_test_ZAD3q7NGx8HFvJFuhaPprcz900EDAARoKQ');


        $charge =$stripe->charges()->create([
            'amount' => Cart::total() *100,
            'currency' => 'usd',
            'source' => $request->stripeToken,
        ]);


        cart::destroy();

        session()->flash('success','Transaction completed successfully');

          Mail::to(auth()->user()->email)->send(new SuccessfulPurchase());


        return redirect(route('confirmation'));


    }

    public function confirmation(){

        return view('user.cart.confirmation')->with('categories',Category::all());

    }



}
