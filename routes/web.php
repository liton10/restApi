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



$router->group(['prefix'=>'api/v1'], function() use($router){
    // Get all analytics for an inputted property
    $router->get('/properties/{id}/analytics', 'PropertyController@showPropertyAnalytics');
    // Adds a property
    $router->post('/property', 'PropertyController@addProperty');
    // Adds analytic to a property
    $router->post('/property/{id}/analytic/{analyticId}', 'PropertyController@addPropertyAnalytic');
    // Gets summary of properties for a suburb
    $router->get('/properties/{suburb}', 'PropertyController@getSuburbPropertySummary');
});
