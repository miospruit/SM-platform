<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'photo_id',
        'confurmed'
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
