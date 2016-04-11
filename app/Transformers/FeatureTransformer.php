<?php

namespace App\Transformers;

use App\Models\Feature;
use League\Fractal;

class FeatureTransformer extends Fractal\TransformerAbstract
{

    public function transform(Feature $feature)
    {
        return [
            'id'          => $feature->id,
            'client_id'   => $feature->client_id,
            'user_id'     => $feature->user_id,
            'title'       => $feature->title,
            'description' => $feature->description,
            'url'         => $feature->url,
            'areas'       => $feature->areas,
            'created_at'  => $feature->created_at->toIso8601String(),
            'updated_at'  => $feature->updated_at->toIso8601String(),
        ];
    }
}
