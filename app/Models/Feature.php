<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Feature extends Model implements Transformable
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
        'target_date',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'client_id' => 'integer',
        'user_id'   => 'integer',
        'areas'     => 'array',
        'done'      => 'boolean',
    ];

    /**
     * Get the client that requested this feature.
     *
     * Note that this method is limiting features to
     * one client. If we ever want to allow this app the
     * ability to combine many similar requests from multiple clients,
     * we'll likely have to go with a pivot table of sorts instead.
     *
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    /**
     * Get the user that created this feature.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
