<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SearchController extends Controller
{
    /**
     * Find the queried resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $columns = Schema::getColumnListing('links');
        $query   = Link::query();
        $search  = '%' . $request->get('q') . '%';

        foreach ($columns as $column) {
            $query->orWhere($column, 'LIKE', $search);
        }
        $links = $query->paginate(10);

        $request->flash();

        return view('search', compact('links'));
    }
}
