@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="co-4">
            <div class="d-flex align-items-center">
                <div>
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" style="display:inline; max-width:50px;" class="rounded-circle ">
                    </div>
                </div>
                <div class=" font-weight-bold ">
                    <a class="text-dark" href="/profile/{{$post->user->id}}">{{ $post->user->username }}</a>
                    <a class="btn btn-sm btn-info ml-3" href="#">Follow</a> 
                </div>
            </div>
            <p class="pt-2"> <span class=" font-weight-bold "><a class="text-dark" href="/profile/{{$post->user->id}}">
                {{ $post->user->username }}</a></span> {{ $post->caption }}
            </p>
        </div>
    </div>
</div>
@endsection