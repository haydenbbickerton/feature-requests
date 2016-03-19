<?php

namespace App\Repositories;

use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class Repository
 * @package namespace App\Repositories;
 */
abstract class Repository extends BaseRepository
{

    /**
     * Get the first record matching the attributes or create it.
     *
     * @param array $attributes
     * @return mixed
     */
    public function firstOrCreate(array $attributes)
    {
        $model = $this->model->firstOrCreate($attributes);
        $this->resetModel();
        return $this->parserResult($model);
    }
}
