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

$app->get('layout/{id}'), 'App\Http\Controllers\LayoutController@show');
$app->update('layout/{id}'), 'App\Http\Controllers\LayoutController@update');

/*
|
| Front-end routing - send all requests to front end for Angular to manage routing
|
*/

$app->get('{path:.*}', function() use ($app) 
{

    return view("app-ui");

});