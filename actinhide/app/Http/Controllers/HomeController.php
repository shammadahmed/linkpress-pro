<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Link;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::orderBy('created_at', 'desc')->take(20)->get();

        return view('home', compact('links'));
    }
}
