<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    protected $fillable = [
        'user_id',
        'photo_id',
        'description'
    ];
    public function Photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
