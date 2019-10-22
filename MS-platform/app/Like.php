<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function Photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
