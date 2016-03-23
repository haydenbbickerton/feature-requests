<?php

/*
 * API Routes
 */

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['middleware' => ['api.auth'], 'namespace' => 'App\Http\Controllers\Api\v1'], function ($api) {

    /*
     * Users
     */
    $api->get('users/me', 'UserController@me');
    $api->resource('users', 'UserController', ['only' => [
        'show'
    ]]);

    /*
     * Clients
     */
    $api->resource('clients', 'ClientController');

        /*
         * Features
         */
        $api->resource('clients.features', 'FeatureController');
});
