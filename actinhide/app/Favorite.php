<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $timestamps = false;

    public function keywords()
    {
        return $this->belongsTo('App\Link');
    }
}
