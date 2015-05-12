<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

/*
|--------------------------------------------------------------------------
| Prototype Routing
|--------------------------------------------------------------------------
|
*/

$app->get('/', function() use ($app) {
    
    $viewName = "prototype.my_kingston.home";

	return view($viewName);

});

$app->get('/my-kingston/', function() use ($app) {
    
    $viewName = "prototype.my_kingston.home";

	return view($viewName);

});

$app->get('/my-kingston/{route}', function($route) use ($app) {
    
    $viewName = "prototype.my_kingston.{$route}";

	return view($viewName);

});

$app->get('/staffspace/', function() use ($app) {
    
    $viewName = "prototype.staffspace.home";

	return view($viewName);

});

$app->get('/staffspace/{route}', function($route) use ($app) {
    
    $viewName = "prototype.staffspace.{$route}";

	return view($viewName);

});

