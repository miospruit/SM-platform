<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $table = "photos";
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
}
