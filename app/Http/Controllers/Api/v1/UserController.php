<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * User resource representation.
 *
 * @Resource("Users", uri="/users")
 */
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('api.auth', ['except' => ['store']]);
    }

    /**
     * Store a user
     *
     * Create a new user and return it, 
     * or return the matching user if one exists.
     *
     * @Post("/")
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show a user
     *
     * Returns the specifieduser.
     *
     * @Get("/{id}")
     */
    public function show($id)
    {
        //
    }
}
