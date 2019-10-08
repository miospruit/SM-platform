<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    //

    public function comments()
    {
        return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'foreign_key', 'local_key');
    }
}
