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

    /* My Accounts Endpoints */
    $app->get('my-tickets', 'App\Http\Controllers\MyAccountsController@myTickets');

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
| Sharepoint - used to present iFrame to sharepoint 
|
*/
$app->get('sharepoint/{view}', function($view) use ($app) 
{
    $view = "routes.$view";
    return view($view);   
});

/*
|
| Track - used to redirect users to the app after clicking 
| a route link from sharepoint or servicedesk
|
*/
$app->group(['prefix' => 'track'], function($app)
{
    $app->get('{source}/{type}', 'App\Http\Controllers\TrackerController@index'); 

});

/*
|
| Icon admin - a temporary route to allow departments/channels to select their icon - remove when live
|
*/

$app->get('icon-selector', 'App\Http\Controllers\IconController@show');
$app->post('icon-selector', 'App\Http\Controllers\IconController@update');


/**********
|
| debugging
|
*/

$app->get('swh', 'App\Http\Controllers\SwhController@swh1');
/*$app->get('swh2', 'App\Http\Controllers\SwhController@authenticate2');

$app->get('images', function() use ($app)
{

	return view("images");

});*/

/*
|
| Front-end routing - send all requests to front end for Angular to manage routing
|
*/

$app->get('{path:.*}',  ['as' => 'navigator',function() use ($app) 
{

    $title = (env('APP_ENV') == 'production') ? 'Navigator' : ucfirst(env('APP_ENV')) . " Navigator";
    return view("app-ui")->with('title', $title);

}]);