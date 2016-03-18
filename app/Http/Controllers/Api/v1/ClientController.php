<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Client resource representation.
 *
 * @Resource("Clients", uri="/clients")
 */
class ClientController extends Controller
{

    /**
     * Show all clients
     *
     * Get a JSON representation of all the clients.
     *
     * @Get("/")
     */
    public function index()
    {
        //
    }

    /**
     * Store a client
     *
     * Create a new client and return it
     *
     * @Post("/")
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show a client
     *
     * Returns the specified client.
     *
     * @Get("/{id}")
     */
    public function show($id)
    {
        //
    }

    /**
     * Update a client
     *
     * Updates the specified client and returns it.
     *
     * @Put("/{id}")
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Destroy a client
     *
     * Deletes the specified client.
     *
     * @Delete("/{id}")
     */
    public function destroy($id)
    {
        //
    }
}
