<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){

        return view('user.cart.index')->with('product',Product::all())->with('categories',Category::all());
    }



    public function add(){
        $product = Product::find(request()->product_id);

        $cart = Cart::add([

            'id' => $product->id,
            'name' => $product->name,
            'qty' => request()->qty,
            'price' =>$product->selling_price,
            'weight' => 0,

        ]);

        Cart::associate($cart->rowId, 'App\Product');

        session()->flash('success','product added to cart successfully');

        return redirect(route('cart'));
    }

    public function delete($id){
        Cart::remove($id);

        session()->flash('success','product deleted from cart successfully');


        return redirect()->back();
    }


    public function incr($id,$qty){

        Cart::update($id,$qty + 1);

        session()->flash('success','cart updated successfully');


        return redirect()->back();

    }


    public function dcr($id,$qty){

        Cart::update($id,$qty - 1);


        session()->flash('success','cart updated successfully');


        return redirect()->back();

    }



    public function productCart($id){
        $product = Product::find($id);

        $cart = Cart::add([

            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' =>$product->selling_price,
            'weight' => 0
        ]);

        Cart::associate($cart->rowId, 'App\Product');

        session()->flash('success','product added to cart successfully');


        return redirect()->back();
    }































}
