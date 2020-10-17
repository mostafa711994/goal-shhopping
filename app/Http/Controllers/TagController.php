<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        return view('admin.tags.index')->with('tags',Tag::all());
    }


    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags|max:50'
        ]);

        Tag::create([

            'name' =>$request->name,
            'user_id' => auth()->user()->id

        ]);

        session()->flash('success','Tag created successfully');


        return redirect(route('tags.index'));

    }


    public function show(Tag $tag)
    {
        //
    }


    public function edit(Tag $tag)
    {
        return view('admin.tags.edit')->with('tag',$tag);
    }


    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|max:50|unique:tags,name,'.$tag->id,
        ]);

        $data = $request->all();
        $tag->update($data);

        session()->flash('success','Tag updated successfully');


        return redirect(route('tags.index'));

    }


    public function destroy(Tag $tag)
    {
        if($tag->products->count() > 0){

            return redirect(route('tags.index'));
        }

        $tag->delete();

        session()->flash('success','Tag deleted successfully');

        return redirect(route('tags.index'));

    }
}
