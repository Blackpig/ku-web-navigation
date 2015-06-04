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
	$app->get('users/{id}', 'App\Http\Controllers\UserController@show');

	
	/* LANDesk Endpoints */
	$app->get('organisations', 'App\Http\Controllers\EndPointController@organisationList');

    $app->get('channels', 'App\Http\Controllers\EndPointController@channelList');

    $app->get('endpoints/{id}', 'App\Http\Controllers\EndPointController@endpointList');

});

$app->get('tile', function() use ($app)
{
	return view("tile");
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