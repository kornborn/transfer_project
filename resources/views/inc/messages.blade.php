@if(count($errors) > 0)
    <div class="col-lg-4">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    </div>
@endif
@if (session('status'))
    <div class="col-lg-4">
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    </div>
@endif