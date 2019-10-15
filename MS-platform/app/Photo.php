<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function Like()
    {
        return $this->hasMany(Like::class);
    }
}
