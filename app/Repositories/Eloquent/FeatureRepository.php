<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Repository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\FeatureRepository as FeatureRepositoryInterface;
use App\Models\Feature;

/**
 * Class FeatureRepository
 * @package namespace App\Repositories\Eloquent;
 */
class FeatureRepository extends Repository implements FeatureRepositoryInterface
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
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
