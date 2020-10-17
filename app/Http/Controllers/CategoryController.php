<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.categories.index')->with('categories',Category::all());
    }


    public function create()
    {
        return view('admin.categories.create')->with('category',Category::all());
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|unique:categories|max:50',
            'description' => 'required|max:100'
        ]);
        $categoryPic = $request->image->store('categories');

        $image = Image::create([
            'name' => $categoryPic,
            'type' => 3
        ]);

        Category::create([
            'name' =>$request->name,
            'description'=>$request->description,
            'user_id' => auth()->user()->id,
            'image_id' => $image->id
        ]);

        session()->flash('success','Category created successfully');


        return redirect(route('categories.index'));
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
       return view('admin.categories.edit')->with('category',$category);
    }


    public function update(Request $request,Category $category)
    {
        $request->validate([
            'name'=> 'required|max:50|unique:categories,name,'.$category->id,
            'description' => 'required|max:100'
        ]);
        $data = $request->all();

        if ($request->hasFile('image')) {


            $categoryPic = $request->image->store('categories');

            $image = Image::create([

                'name' => $categoryPic,
                'type' => 3
            ]);

            $catPic = $category->image->name;
            Storage::delete($catPic);

            $data['image_id'] = $image->id;
        }


        $category->update($data);

        session()->flash('success','Category updated successfully');


        return redirect(route('categories.index'));

    }


    public function destroy(Category $category)
    {

            if($category->products->count() > 0){

                return redirect(route('categories.index'));
            }

        $catPic = $category->image->name;

        Storage::delete($catPic);

        $category->delete();

        session()->flash('success','Category deleted successfully');


        return redirect(route('categories.index'));
    }
    //End Admin Area




























}
