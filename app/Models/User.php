<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class User extends Authenticatable implements Transformable
{
    use SoftDeletes, TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'google_id',
        'first_name',
        'last_name',
        'display_name',
        'email',
        'picture',
    ];

    /**
     * Get the features created by this user (on behalf of clients).
     */
    public function features()
    {
        return $this->hasMany('App\Models\Feature');
    }
}
