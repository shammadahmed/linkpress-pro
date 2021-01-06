<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

// Whois routes
Route::get('whois', function (Request $request) use ($router) {
    $domain = $router->getCurrentRequest()->get('domain');

    $whois            = new Whois();
    $whois->deepWhois = false;
    $data             = $whois->lookup($router->getCurrentRequest()->get('domain'), false);

    return $data['rawdata'];
});

// API routes
Route::get('api', 'APIController@show');
Route::get('api/documentation', 'APIController@documentation');

// Home route
Route::get('/', 'HomeController@index');

//Search links routes
Route::get('link/search', 'SearchController@find');

// Dashboard routes
Route::get('admin', 'AdminController@getIndex');
Route::post('admin', 'AdminController@postIndex');
Route::get('admin/user', 'AdminController@getUser');
Route::post('admin/user', 'AdminController@postUser');
Route::get('admin/links', 'AdminController@getLinks');
Route::get('admin/protection', 'AdminController@getProtection');
Route::post('admin/protection', 'AdminController@postProtection');

// Authentication routes
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::post('register', 'Auth\AuthController@postRegister');

// Categories routes
Route::get('links/categories', 'CategoriesController@index');
Route::get('links/category/{name}', 'CategoriesController@show');

// Favorite link route
Route::any('favorites/{link}', 'FavoritesController@add');

// Link routes
Route::resource('link', 'LinksController');
Route::get('links', 'LinksController@index');
Route::get('links/top', 'LinksController@top');
Route::get('links/import', 'LinksController@getImport');
Route::post('links/import', 'LinksController@postImport');
Route::get('links/top', 'LinksController@top');
Route::get('{hash}', 'LinksController@show');
