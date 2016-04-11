<?php

namespace App\Transformers;

use App\Models\Client;
use App\Models\Feature;
use App\Transformers\FeatureTransformer;
use League\Fractal;

class ClientTransformer extends Fractal\TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'features'
    ];

    public function transform(Client $client)
    {
        return [
            'id'          => $client->id,
            'name'        => $client->name,
            'created_at'  => $client->created_at->toIso8601String(),
            'updated_at'  => $client->updated_at->toIso8601String(),
        ];
    }

    /**
     * Include Client Features
     *
     */
    public function includeFeatures(Client $client)
    {
        return $this->collection($client->features()->get(), new FeatureTransformer);
    }
}
