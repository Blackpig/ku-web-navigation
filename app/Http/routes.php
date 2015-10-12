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
| Cache clear
|
*/

$app->get('cache-clear/{id}', function($id) use ($app) 
{
    if (strtolower($id) == 'all') {
        \Cache::flush();
    } else {
        \Cache::forget($id);
    }
    //return true;   
});

/*
|
| Sharepoint - used to present iFrame to sharepoint 
| No longer used - left here for reference
|
*/
/*$app->get('sharepoint/{view}', function($view) use ($app) 
{
    $view = "routes.$view";
    return view($view);   
});*/

/*
|
| Front-end routing - send all requests to front end for Angular to manage routing
| DO NOT MOVE - This is a catch all route and should remain as the last route within
| the file
|
*/

$app->get('{path:.*}',  ['as' => 'navigator',function() use ($app) 
{
    return view("app-ui");

}]);