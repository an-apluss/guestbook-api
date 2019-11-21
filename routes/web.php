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
    return 'Online Guestbook ';
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'signatures'], function () use ($router) {
        $router->post('/', [
            'uses' => 'SignatureController@create'
        ]);

        $router->get('/', [
            'uses' => 'SignatureController@index'
        ]);

        $router->get('/{signatureId}', [
            'uses' => 'SignatureController@read'
        ]);

        $router->post('/{signatureId}', [
            'uses' => 'SignatureController@update'
        ]);

        $router->delete('/{signatureId}', [
            'uses' => 'SignatureController@delete'
        ]);
    });
});