<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Repository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\ClientRepository as ClientRepositoryInterface;
use App\Models\Client;

/**
 * Class ClientRepository
 * @package namespace App\Repositories\Eloquent;
 */
class ClientRepository extends Repository implements ClientRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
