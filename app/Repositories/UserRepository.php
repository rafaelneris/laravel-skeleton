<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryAdapterContract;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\Models\User;

/**
 * Class UserRepository
 * @package App\Repositories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserRepository extends DefaultRepository implements UserRepositoryContract
{
    /** @var UserRepositoryAdapterContract */
    protected $adapter;

    /**
     * @param array $userData
     * @return User
     */
    public function create(array $userData)
    {
        return $this->adapter->create($userData);
    }
}
