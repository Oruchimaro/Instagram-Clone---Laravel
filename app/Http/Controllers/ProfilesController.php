<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $followersCount = Cache::remember('count.followers.'.$user->id, now()->addSeconds(60) ,function() use ($user){
            return $user->profile->followers->count();
        });

        $followingCount = Cache::remember('count.following.'.$user->id, now()->addSeconds(60) ,function() use ($user){
            return $user->following->count();
        });


        if($user)
        {
            return view('profiles.home',compact('user', 'follows', 'followersCount', 'followingCount') );
        }else
        {
            abort(404, 'User Not Found');
        }
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, USer $user)
    {
        $this->authorize('update', $user->profile);
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if($request->image)
        {
            $imagePath = $request->image->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        )
        );

        return redirect()->route('profile.show', compact('user'));
    }

    public function users()
    {
        $all = User::paginate(9);
        return view('profiles.all', compact('all'));
    }
}
