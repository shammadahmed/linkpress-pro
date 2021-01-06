<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Link;
use App\Repositories\LinksRepository;

class CategoriesController extends Controller
{
    /**
     * @var mixed
     */
    public $links;

    /**
     * @param LinksRepository $links
     */
    public function __construct(LinksRepository $links)
    {
        $this->links = $links;
    }

    /**
     * @var array
     */
    private $categories = [
        'Arts',
        'Entertainment',
        'Autos',
        'Vehicles',
        'Beauty',
        'Fitness',
        'Books',
        'Literature',
        'Business',
        'Industry',
        'Career',
        'Education',
        'Computer',
        'Electronics',
        'Finance',
        'Food',
        'Drink',
        'Gambling',
        'Games',
        'Health',
        'Home',
        'Garden',
        'Internet',
        'Telecom',
        'Law',
        'Government',
        'Law',
        'News',
        'Media',
        'People',
        'Society',
        'Pets',
        'Animals',
        'Recreation',
        'Hobbies',
        'Reference',
        'Science',
        'Shopping',
        'Sports',
        'Travel',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = array_map(function ($value) {
            return [
                'name'  => $value,
                'count' => $this->links->search($value)->count(),
            ];
        }, $this->categories);

        return view('categories.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $links = $this->links->search($name);

        return view('categories.show', compact('links', 'name'));
    }
}
