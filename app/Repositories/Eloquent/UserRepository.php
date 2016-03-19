<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Repository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\UserRepository as UserRepositoryInterface;
use App\Models\User;

/**
 * Class UserRepository
 * @package namespace App\Repositories\Eloquent;
 */
class UserRepository extends Repository implements UserRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
