<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model implements Transformable
{
    use SoftDeletes, TransformableTrait;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'feature_priorities' => 'object',
    ];

    /**
     * Get the features requested by this client.
     */
    public function features()
    {
        return $this->hasMany('App\Models\Feature');
    }

    /**
     * Return an array full of this clients feature request ids.
     */
    public function getFeatureIdsAttribute()
    {
        return $this->features->lists('id');
    }
}
