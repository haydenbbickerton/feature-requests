<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\FeatureRepository;
use App\Models\Feature;
use App\Validators\FeatureValidator;;

/**
 * Class FeatureRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class FeatureRepositoryEloquent extends BaseRepository implements FeatureRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Feature::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FeatureValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
