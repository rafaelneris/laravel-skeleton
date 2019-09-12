<?php

namespace App\Repositories\Contracts;

use App\Repositories\Models\User;

/**
 * Interface UserRepositoryContract
 * @package App\Repositories\Contracts
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface UserRepositoryContract extends DefaultRepositoryContract
{
    /**
     * @param array $userData
     * @return User
     */
    public function create(array $userData);
}
