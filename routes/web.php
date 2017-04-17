<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

$router->get('/', function () {
    return view('welcome');
});

$router->get('tasks/get-all', 'TaskController@getAll');
$router->resource('tasks', 'TaskController');
$router->get('notifications', 'NotificationController@index');
$router->get('notifications/get-all', 'NotificationController@getAll');
$router->get('notifications/read', 'NotificationController@readAllNotification');
$router->resource('users', 'UserController');
