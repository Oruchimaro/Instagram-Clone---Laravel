@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- image -->
        <div class="col-3 p-d">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100" alt="">
        </div>
        <!-- rest of the shits -->
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex">
                    <div class="h2 d-inline">{{ $user->username }}</div>
                    <follow-button user-id="{{ $user->id }}" follows={{ $follows }} ></follow-button>
                </div>
                <div>
                    @can('update', $user->profile)
                    <a href="{{ route('post.create') }}" class="btn btn-lg btn-success">New Post</a>
                    @endcan
                </div>
            </div>
            <div>
                @can('update', $user->profile)
                <a class="btn btn-sm btn-info" href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                @endcan
            </div>
            <div class="d-flex">
                <div class="pr-5" ><strong> {{ $user->posts_count }} </strong> posts</div>
                <div class="pr-5" ><strong> {{ $followersCount }} </strong> followers </div>
                <div class="pr-5" ><strong> {{ $followingCount }} </strong> following </div>
            </div>
            <div class="pt-4 font-weight-bold"> {{ $user->profile->title }} </div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach ($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}"><img src="/storage/{{ $post->image }} " class="w-100"></a>
        </div>
        @endforeach
    </div>

</div>
@endsection