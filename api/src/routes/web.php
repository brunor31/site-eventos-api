<?php

use App\Http\Controllers\LumenAuthController;

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('register', 'UserController@store');
    $router->group(['middleware' => 'auth:api'], function () use ($router){
        $router->group(['prefix' => 'user'], function () use ($router){
            $router->get('/getAll', 'UserController@getAll');
            $router->get('/get', 'UserController@get');
            $router->put('/update', 'UserController@update');
            $router->delete('/destroy', 'UserController@destroy');
            $router->get('/getMenus', 'UserController@getMenus');
        });
    });
});
