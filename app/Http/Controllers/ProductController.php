<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Notifications\NewProduct;
use App\Product;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.products.index')
            ->with('products', Product::all())
            ->with('category', Category::all())
            ->with('tag', Tag::all());
    }


    public function create()
    {
        return view('admin.products.create')->with('categories', Category::all())->with('tags', Tag::all());
    }


    public function store(Request $request, Product $product)
    {
        $request->validate([

            'name' => 'required|unique:products|max:50',
            'selling_price' => 'required|numeric',
            'buying_price' => 'required|numeric',
            'discount' => 'required|numeric',
            'description' => 'required|max:100',
            'details' => 'required',
            'is_available' => 'required',
            'trend' => 'required',
            'best_seller' => 'required',
            'image' => 'required',
            'category' => 'required',
        ]);

        $productPic = $request->image->store('products');

        $image = Image::create([

            'name' => $productPic,
            'type' => 2
        ]);

        $newProduct = Product::create([
            'name' => $request->name,
            'selling_price' => $request->selling_price,
            'buying_price' => $request->buying_price,
            'discount' => $request->discount,
            'description' => $request->description,
            'details' => $request->details,
            'is_available' => $request->is_available,
            'trend' => $request->trend,
            'best_seller' => $request->best_seller,
            'image_id' => $image->id,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id
        ]);

        if ($request->tags) {

            $newProduct->tags()->attach($request->tags);
        }

        $user = User::where('role' ,'=', 'admin')->get();

            Notification::send($user,new NewProduct($newProduct));


        session()->flash('success','Product created successfully');


        return redirect(route('products.index'));

    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        return view('admin.products.edit')
            ->with('product', $product)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([

            'name' => 'required|max:50|unique:products,name,' . $product->id,
            'selling_price' => 'required|numeric',
            'buying_price' => 'required|numeric',
            'discount' => 'required|numeric',
            'description' => 'required|max:100',
            'details' => 'required',
            'is_available' => 'required',
            'trend' => 'required',
            'best_seller' => 'required',
            'category' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {


            $productPic = $request->image->store('products');

            $image = Image::create([

                'name' => $productPic,
                'type' => 2
            ]);

            $proPic = $product->image->name;
            Storage::delete($proPic);

            $data['image_id'] = $image->id;
        }

        if ($request->tags) {

            $product->tags()->sync($request->tags);
        }

        $product->update($data);

        session()->flash('success','Product updated successfully');


        return redirect(route('products.index'));
    }


    public function destroy($id)
    {
        $product = Product::withTrashed()->where('id', $id)->firstOrFail();
        if ($product->trashed()) {

            $proPic = $product->image->name;
            Storage::delete($proPic);

            $product->forceDelete();

            session()->flash('success','Product deleted successfully');

            return redirect(route('trashedProducts'));

        } else {

            $product->delete();
            session()->flash('success','Product trashed successfully');

            return redirect(route('products.index'));
        }


    }

    public function trash(Product $product)
    {

        $trashed = Product::onlyTrashed()->get();

        return view('admin.products.trashProduct')->with('products', $trashed);
    }


    public function restore($id)
    {
        $product = Product::withTrashed()->where('id', $id)->firstOrFail();

        $product->restore();


        session()->flash('success','Product restored successfully');

        return redirect()->back();

    }


}
