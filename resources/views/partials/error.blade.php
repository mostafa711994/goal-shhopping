@if(count($errors) > 0)
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach($errors->all() as $error)
                <p>
                    <i class="fa fa-caret-right"></i>
                    <span>{{$error}}</span>
                </p>


            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif