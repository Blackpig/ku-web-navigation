<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

/*
|
| API Routing
|
*/

$app->group(['prefix' => 'api'], function($app)
{

	/* User Endpoints */
	$app->get('users/authenticate', 'App\Http\Controllers\UserController@authenticate');

	
	/* LANDesk Endpoints */
	$app->get('organisations', 'App\Http\Controllers\EndpointController@organisationList');

    $app->get('channels', 'App\Http\Controllers\EndpointController@channelList');

    $app->get('endpoints/0/{id}', 'App\Http\Controllers\EndpointController@organisationEndpointList');

    $app->get('endpoints/1/{id}', 'App\Http\Controllers\EndpointController@channelEndpointList');

    $app->get('search/{term}', 'App\Http\Controllers\EndpointController@searchEndpoints');

});

/*
|
| Layout admin - used to layout tiles in an embedded element in LANDesk
|
*/

$app->get('layout/{type}/{id}', 'App\Http\Controllers\LayoutController@show'); 
$app->post('layout/{id}', 'App\Http\Controllers\LayoutController@update'); 


/*
|
| Icon admin - a temporary route to allow departments/channels to select their icon - remove when live
|
*/

$app->get('icon-selector', 'App\Http\Controllers\IconController@show');
$app->post('icon-selector', 'App\Http\Controllers\IconController@update');

/*
|
| iFrame routing
|
*/


/*$app->get('routes/staffspace', function() use ($app)
{

	return view("routes.staffspace");

});

$app->get('routes/my-kingston', function() use ($app)
{

	return view("routes.my-kingston");

});

$app->get('routes/my-kingston-1', function() use ($app)
{

	return view("routes.my-kingston-1");

});

$app->get('routes/my-kingston-2', function() use ($app)
{

	return view("routes.my-kingston-2");

});

$app->get('routes/my-kingston-3', function() use ($app)
{

	return view("routes.my-kingston-3");

});

$app->get('routes/my-kingston-4', function() use ($app)
{

	return view("routes.my-kingston-4");

});*/

/**********
|
| debugging
|
*/

$app->get('swh', 'App\Http\Controllers\SwhController@authenticate');

$app->get('images', function() use ($app)
{

	return view("images");

});

/*
|
| Front-end routing - send all requests to front end for Angular to manage routing
|
*/

$app->get('{path:.*}', function() use ($app) 
{

    return view("app-ui");

});