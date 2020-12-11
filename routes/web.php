<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// grouping route with auth middleware and prefix api
// note: you can change middleware logic at App\Http\Providers\AuthServiceProvider

$router->group(['middleware' => 'auth','prefix' => 'api'], function () use ($router) {

  $router->get('/products', 'ProductController@getAll');
  $router->get('/sales', 'SalesController@getAll');
  $router->get('/inventories', 'InventoryController@getAll');


});
