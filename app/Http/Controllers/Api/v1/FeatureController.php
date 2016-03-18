<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Feature resource representation.
 *
 * @Resource("Features", uri="/clients/{id}/features")
 */
class FeatureController extends Controller
{

    /**
     * Show all features
     *
     * Get a JSON representation of all the clients features.
     *
     * @Get("/")
     */
    public function index()
    {
        //
    }

    /**
     * Store a feature
     *
     * Create a new feature and return it
     *
     * @Post("/")
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show a feature
     *
     * Returns the specified feature.
     *
     * @Get("/{id}")
     */
    public function show($id)
    {
        //
    }

    /**
     * Update a feature
     *
     * Updates the specified feature and returns it.
     *
     * @Put("/{id}")
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Destroy a feature
     *
     * Deletes the specified feature.
     *
     * @Delete("/{id}")
     */
    public function destroy($id)
    {
        //
    }
}
