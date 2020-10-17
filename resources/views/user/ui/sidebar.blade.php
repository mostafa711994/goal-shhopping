<div class="col-xl-3 col-lg-4 col-md-5">
    <div class="sidebar-categories">
        <div class="head">Browse Categories</div>
        <ul class="main-categories" style="list-style-type:disc;">
            @foreach($categories as $category)
                <li><a style="color: #6b6d7d " href="{{route('category',$category->id)}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="sidebar-categories">
        <div class="head" >Product Tags</div>
        <ul class="main-categories" style="list-style-type:disc;">
            @foreach($tags as $tag)
                <li><a style="color: #6b6d7d " href="{{route('tag',$tag->id)}}">{{$tag->name}}</a></li>
            @endforeach
        </ul>

    </div>
</div>