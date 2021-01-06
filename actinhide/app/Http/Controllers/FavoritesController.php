<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Http\Controllers\Controller;
use App\Link;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add($linkId, Request $request)
    {
        $link = Link::find($linkId);

        if ($link = $link->favorites()->where('ip', getipAddress())->first()) {

            $link->update([
                'link_id' => $linkId,
                'rating' => $request->get('rating'),
                'ip' => getIpAddress(),
            ]);

            return;
        }

        $favorite = new Favorite;

        $favorite->rating = $request->get('rating');
        $favorite->ip = getIpAddress();
        $favorite->link_id = $linkId;

        $favorite->save();

        return 'OK';
    }
}
