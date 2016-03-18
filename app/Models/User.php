<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class User extends Model implements Transformable
{
    use SoftDeletes, TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'display_name',
        'email',
        'picture',
        'access_token',
        'token_expires_in',
        'token_timestamp',
    ];

    /**
     * Get the features created by this user (on behalf of clients).
     */
    public function features()
    {
        return $this->hasMany('App\Models\Feature');
    }
}
