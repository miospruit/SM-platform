<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function Photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
