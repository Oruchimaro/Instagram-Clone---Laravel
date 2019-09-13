@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-deck mb-3 text-center">
        @foreach ($all as $users)
        <div class="row">
            <div class="card" style="width: 18rem;">
            <img src="/storage/{{$users->profile->image}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> {{$users->username}} </h5>
                <p class="card-text">{{$users->profile->description}}</p>
                <a href="/profile/{{$users->id}}" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $all->links() }}
        </div>
    </div>
</div>
@endsection