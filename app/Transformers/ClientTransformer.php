<?php

namespace App\Transformers;

use App\Models\Client;
use League\Fractal;

class ClientTransformer extends Fractal\TransformerAbstract
{

    public function transform(Client $client)
    {
        return (object) [
            'id'                 => $client->id,
            'name'               => $client->name,
            'features'           => (array) $this->orderFeatures($client->features, $client->feature_priorities),
            'feature_priorities' => $client->feature_priorities,
            'created_at'         => $client->created_at->toIso8601String(),
            'updated_at'         => $client->updated_at->toIso8601String(),
        ];
    }

    /**
     * Return an ordered array of features, sorted according to the
     * feature priority param. Any feature not assigned priority will
     * be appended to end of list in no guaranteed order.
     *
     * Lol, this part needs some work.
     */
    private function orderFeatures($features, $feature_priorities, $client_id = null)
    {
        $orderedFeatures = collect([]);
        $features = $features->keyBy('id');
        $feature_priorities = collect($feature_priorities);

        // Loop through features with assigned priority, push to new collections
        // and forget in the old collection
        $feature_priorities->each(function ($item, $key) use ($orderedFeatures, $features, $client_id) {
            $orderedFeatures->push($features->whereLoose('id', $item)->values()->all()[0]);
            $features->forget($item);
        });

        // Push remaining features (without priority) to end of array
        if ((bool) $features->count()) {
            $features->each(function ($item, $key) use ($orderedFeatures) {
                $orderedFeatures->push($item);
            });
        }

        return $orderedFeatures->values()->toArray();
    }
}
