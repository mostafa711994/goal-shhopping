    @foreach($products as $product)
        <div class="col-md-6 col-lg-4">
            <div class="card text-center card-product">
                <div class="card-product__img">
                    <img class="card-img" src="{{url('/storage/'.$product->image->name)}}"
                         alt="">
                    <ul class="card-product__imgOverlay">
                        <li>
                            <a href="{{route('show',$product->id)}}">
                                <button><i class="ti-search"></i></button>
                            </a>
                        </li>
                        <li>
                            <button>
                                <a href="{{route('add-product-cart',$product->id)}}"><i class="ti-shopping-cart"></i></a>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <p>{{$product->category->name}}</p>
                    <h4 class="card-product__title"><a
                            href="{{route('show',$product->id)}}">{{$product->name}}</a>
                    </h4>
                    <p class="card-product__price">{{$product->selling_price}}</p>
                </div>
            </div>
        </div>
    @endforeach

{{$products->links()}}
