@extends('layouts.app')

@section('content')
<div class="container">
    @if ($posts->count() > 0)
        @foreach ($posts as $post)
        <div class="row">
            <div class="col-6 offset-3">
                <a href="/profile/{{$post->user->id}}">
                    <img src="/storage/{{$post->image}}" class="w-100">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 pt-2 pb-4">
                <p class="pt-2"> <span class=" font-weight-bold "><a class="text-dark" href="/profile/{{$post->user->id}}">
                    {{ $post->user->username }}</a></span> {{ $post->caption }}
                </p>
            </div>
        </div>
        @endforeach
    @else
        <a href="{{ route('users.all') }}">Browse users to see some posts</a>
    @endif
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection