<?php

/*
 * API Routes
 */

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\v1'], function ($api) {

    /*
     * Users
     */
    $api->resource('users', 'UserController');

    /*
     * Clients
     */
    $api->resource('clients', 'ClientController');

        /*
         * Features
         */
        $api->resource('clients.features', 'FeatureController');
});
