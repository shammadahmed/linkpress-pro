<?php

namespace App\Http\Controllers;

use App\Helpers\LinkOrganizer;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkRequest;
use App\Keyword;
use App\Link;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::paginate(5);

        return view('links.index', compact('links'));
    }

    public function top()
    {
        $links = Link::where('visits', '>', 1)
            ->orderBy('visits', 'desc')
            ->take(10)
            ->get();

        return view('links.top', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getImport()
    {
        return view('links.import');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request, LinkOrganizer $link)
    {
        $data = $this->createLink($request->input('url'), $link, $request->input('hash'));

        return redirect($data['hash']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postImport(LinkRequest $request, LinkOrganizer $link)
    {
        $urls = explode(PHP_EOL, $request->input(['url']));

        foreach ($urls as $url) {
            $shortenedLinks[] = $this->createLink($url, $link);
        }

        session()->flash('shortenedLinks', $shortenedLinks);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hash)
    {
        $sLink = Link::with(['keywords', 'favorites'])->where('hash', $hash)->with('keywords')->firstOrFail();

        if ($sLink) {

            $favorites = $sLink->favorites()->lists('rating');
            $sLink->visits++;
            $sLink->update();

            if ($IpBasedRating = $sLink->favorites()->where('ip', getipAddress())->first()) {
                $sLink->rating = $IpBasedRating->rating;
            } else {
                $sLink->rating = 0;
            }

            return view('links.show', compact('sLink'));
        }

        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($hash)
    {
        $link = Link::where('hash', $hash)->delete();

        session()->flash('status', 'The Link was deleted successfully!');

        return back();
    }

    public function createLink($url, LinkOrganizer $link, $hash)
    {
        $data = $link->organize($url);

        if ($data['title'] = "") {
            session()->flash('message', 'The Link is invalid');
            redirect()->back();
        }

        if ($hash) {
            $data['hash'] = $hash;
        }

        $link = Link::create($data);
        if (($data['keywords'])) {
            $keywords = explode(',', $data['keywords']);

            foreach ($keywords as $key) {
                $keyword       = new Keyword;
                $keyword->name = $key;
                $keyword->save();
                $link->keywords()->attach($keyword);
            }
        }

        return $data;
    }
}
