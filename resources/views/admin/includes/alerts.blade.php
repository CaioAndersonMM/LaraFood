@if ($errors->any())
    <div class="alert">
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
            {{ session('error') }}      
    </div>
@endif

@if (session('message'))
    <div class="alert alert-danger">
            {{ session('message') }}      
    </div>
@endif