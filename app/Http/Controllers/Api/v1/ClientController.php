<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Contracts\Repositories\ClientRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Transformers\ClientTransformer;
use Dingo\Api\Routing\Helpers;

/**
 * Client resource representation.
 *
 * @Resource("Clients", uri="/clients")
 */
class ClientController extends Controller
{


    use Helpers;

    public function __construct(ClientRepository $clients)
    {
        $this->clients = $clients;
    }

    /**
     * Show all clients
     *
     * Get a JSON representation of all the clients.
     *
     * @Get("/")
     */
    public function index()
    {
        return $this->response->collection($this->clients->all(), new ClientTransformer);
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
        $client = $this->clients->find((int) $id);
        
        return $this->response->item($client, new ClientTransformer);
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
