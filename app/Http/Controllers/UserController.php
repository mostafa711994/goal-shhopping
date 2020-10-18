<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function notifications()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return view('admin.notification')->with('notifications', auth()->user()->notifications()->simplePaginate(10));

    }




    public function index()
    {
        return view('admin.users.index')->with('users', User::all());

    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'role' => 'required',
            'username' => 'required|unique:users|max:50',
            'email' => 'required| email|unique:users|max:50',
            'password' => 'required|max:100',
            'address' => 'required',
            'phone_number' => 'required|numeric',
        ]);

//
        $profilePic = $request->image->store('profilePic');


        $image = Image::create([

            'name' => $profilePic,
            'type' => 1
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'image_id' => $image->id,
            'password' => Hash::make($request->password),
            'api_token' => Str::random(60),
            'address' => $request->address,
            'phone_number' => $request->phone_number,

        ]);

        session()->flash('success','User created successfully');


        return redirect(route('users.index'));
    }


    public function show(User $user)
    {
        return view('admin.ui.topbar')->with('user', User::all());
    }


    public function edit(User $user)
    {
        return view('admin.users.edit')->with('user', $user)->with('image', Image::all());
    }

    public function update(Request $request, User $user)
    {


        $data = $request->only('role');

        $user->update($data);

        session()->flash('success','User Updated successfully');

        return redirect(route('users.index'));
    }


    public function destroy($id)
    {
        $user = User::where('id', '=', $id)->firstOrFail();


        if ($user->image_id !== null) {
            $proPic = $user->image->name;
            Storage::delete($proPic);
        }

        $user->delete();

        session()->flash('success','User deleted successfully');


        return redirect(route('users.index'));
    }


    public function register(Request $request)
    {

        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'username' => 'required|unique:users|max:50',
            'email' => 'required| email|unique:users|max:50',
            'password' => 'required|max:100',
            'address' => 'required',
            'phone_number' => 'required|numeric',
        ]);


        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_token' => Str::random(60),
            'address' => $request->address,
            'phone_number' => $request->phone_number,

        ]);

        return redirect(route('login'));

    }

    public function showProfile(User $user)
    {


        return view('profile')->with('user', $user)->with('image', Image::all())->with('categories', Category::all());
    }

    public function profile(Request $request, User $user)
    {

        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'username' => 'required|max:50|unique:users,username,' . $user->id,
            'email' => 'required|email|max:50|unique:users,email,' . $user->id,
            'password' => 'required|max:100',
            'address' => 'required',
            'phone_number' => 'required|numeric',
        ]);

        $data = $request->all();


        $image = $request->file('image');

        $extension = $image->getClientOriginalExtension();
        $imageName = sha1(time());
        $file = Storage::disk('public')->put('/uploads/' . $imageName . '.' . $extension ,File::get($image));


        $note = new Image();
        $note->name =$imageName . '.' . $extension;
        $note->type = 1;
        $note->save();





            $data['image_id'] = $note->id;


        if( Auth::user()->password !== $request->password){
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        session()->flash('success','Profile info updated successfully');


        return redirect()->back();


    }


}

