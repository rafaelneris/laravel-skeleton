<?php

namespace App\Repositories\Contracts;

use App\Repositories\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface UserRepositoryAdapterContract
 * @package App\Repositories\Contracts@@
 * @author Rafael Neris Cruz <rafaelnerisdj@gmail.com>
 */
interface UserRepositoryAdapterContract
{
    /**
     * @param array $data
     * @return User
     */
    public function create(array $data);

    /**
     * @param integer $id
     * @return Model
     */
    public function findById($id);

    /**
     * @return Model|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll();
}
