<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index(Request $request){


            $products = Product::paginate(3);
            return view('user.shop.index')
                ->with('products',$products)
                ->with('categories',Category::all())
                ->with('tags',Tag::all());



    }
    public function paginate(Request $request){


        $products = Product::paginate(3);
        return view('user.shop.paginateShop')
            ->with('products',$products)
            ->with('categories',Category::all())
            ->with('tags',Tag::all());



    }


    public function search(Request $request){
        $products = Product::where('name','LIKE','%'.$request->get('searchInput').'%')->with('category')->with('image')->get();
        if($products){
            return response()->json($products);
        }
    }

    public function category(Category $category){


            $products = $category->products()->paginate(3);

        return view('user.shop.category')
            ->with('categories',Category::all())
            ->with('products',$products)
            ->with('category',$category)
            ->with('tags',Tag::all());
    }
    public function categoryPaginate(Category $category){


        $products = $category->products()->paginate(3);

        return view('user.shop.paginateCategory')
            ->with('categories',Category::all())
            ->with('products',$products)
            ->with('category',$category)
            ->with('tags',Tag::all());
    }
    public function categorySearch(Request $request,Category $category){

        $products = $category->products()->where('name','LIKE','%'.$request->get('searchInput').'%')->with('category')->with('image')->get();
        if($products){
            return response()->json($products);
        }

        return response()->json([]);

    }
    public function tag(Tag $tag){


            $products = $tag->products()->paginate(3);


        return view('user.shop.tag')
            ->with('categories',Category::all())
            ->with('products',$products)
            ->with('tag',$tag)
            ->with('tags',Tag::all());
    }
    public function tagPaginate(Tag $tag){


        $products = $tag->products()->paginate(3);


        return view('user.shop.paginateTag')
            ->with('categories',Category::all())
            ->with('products',$products)
            ->with('tag',$tag)
            ->with('tags',Tag::all());
    }

    public function tagSearch(Request $request,Tag $tag){

        $products = $tag->products()->where('name','LIKE','%'.$request->get('searchInput').'%')->with('category')->with('image')->get();
        if($products){
            return response()->json($products);
        }

        return response()->json([]);

    }


    public function show(Product $product){

        return view('user.shop.show')
            ->with('categories',Category::all())
            ->with('product',$product)
            ->with('tags',Tag::all());



    }
}
