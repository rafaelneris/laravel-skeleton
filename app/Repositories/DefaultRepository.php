<?php

namespace App\Repositories;

use App\Repositories\Contracts\DefaultRepositoryAdapterContract;
use App\Repositories\Contracts\DefaultRepositoryContract;

/**
 * Class DefaultRepository
 * @package App\Repositories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
abstract class DefaultRepository implements DefaultRepositoryContract
{
    /* @var DefaultRepositoryAdapterContract */
    protected $adapter;

    /**
     * Default Repository
     * @param DefaultRepositoryAdapterContract $adapter
     */
    public function __construct(DefaultRepositoryAdapterContract $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function findAll()
    {
        $collection = $this->adapter->findAll();
        return $collection;
    }

    /**
     * Retornar um registro por Id
     * @param int $id
     * @return array|\Illuminate\Database\Eloquent\Model
     */
    public function findById($id)
    {
        $model = $this->adapter->findById($id);
        return $model;
    }
}
