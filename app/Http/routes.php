<?php

/*
 * Auth Routes
 *
 * This Laravel installation only serves authentication views.
 * Users that are logged in will be redirect to the UI via middleware.
 */
Route::group(['middleware' => ['web', 'guest']], function () {
    require_once __DIR__ . "/Routes/auth.php";
});

/*
 * API Routes
 */
require_once __DIR__ . "/Routes/api.php";
