<?php

namespace App\Http\Controllers;

use App\Category;
use App\Message;
use App\Notifications\NewMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{

    public function index()
    {
        return view('admin.messages')->with('messages',Message::all());
    }


    public function create()
    {
        return view('user.contact')->with('categories',Category::all());
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|max:125',
            'subject' => 'required|max:100',
            'body' => 'required',
        ]);



        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body,
            'user_id' => auth()->user()->id,


        ]);



        if (Auth::check()){

            session()->flash('success','Message sent successfully');

            return redirect(route('contact'));
        }else{
            session()->flash('error','You have to login first');

            return redirect()->back();

        }


    }


    public function show(Message $message)
    {
        //
    }


    public function edit(Message $message)
    {
        //
    }


    public function update(Request $request, Message $message)
    {
        //
    }


    public function destroy(Message $message)
    {
        //
    }
}
