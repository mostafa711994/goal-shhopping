<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Notifications\NewComment;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin.comments')->with('comments', Comment::all());
    }


    public function create()
    {
        return view('user.shop.show');
    }


    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|max:125',
            'phone_number' => 'required|max:100',
            'message' => 'required',
        ]);


        auth()->user()->comments()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'message' => $request->message,
            'product_id' => $product->id,

        ]);

        $users = User::where('role', '=', 'admin')->get();
        Notification::send($users, new NewComment($product));

        if (Auth::check()) {
            return redirect()->back();
        } else {
            session()->flash('error','you have to login first');

            return redirect()->back();

        }
    }


    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        //
    }


    public function update(Request $request, Comment $comment)
    {
        //
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();


        session()->flash('success','Comment deleted successfully');

        return redirect(route('comment.index'));
    }


}
