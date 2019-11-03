<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Photo extends Model
{
    protected $table = "photos";
    //alwasy get user with photo
    protected $with = ['user'];

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function Likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like()
    {
        Like::create([
            'user_id' => Auth::user()->id,
            'photo_id' => $this->id,
            'confirmed' => 1
        ]);
    }
}
