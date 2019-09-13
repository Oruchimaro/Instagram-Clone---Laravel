<?php

namespace App;
// use App\Profile;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'username'
    ];
    protected $appends = [
        'posts_count'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function($user){
            $user->profile()->create([
                'title' => $user->username,
                'image' => '/defaults/noImg.png',
                'url' => 'https://example.com',
                'description' => 'more about you...',
            ]);

            Mail::to($user->email)->send(new NewUserWelcomeMail);
        });
    }

    public function getPostsCountAttribute()
    {
        return $this->posts->count();
    }
    //===================================Relations===================================
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }
}
