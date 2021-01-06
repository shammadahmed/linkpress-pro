<?php

namespace App\Helpers;

use App\Link;
use Illuminate\Support\Str;

class Hash
{
    /**
     * @return mixed
     */
    public function generate()
    {
        do {
            $hash = Str::random(6); // generates a random 6 character string
        } while (!Link::where('hash', $hash));

        return $hash;
    }
}
