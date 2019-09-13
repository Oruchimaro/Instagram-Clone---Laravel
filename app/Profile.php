<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'title',
        'description',
        'url',
        'image'
    ];

    public function profileImage ()
    {
        return ($this->image) ? '/storage/'. $this->image : '/storage/defaults/noImg.png';
    }
    //===================================Relations===================================
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
