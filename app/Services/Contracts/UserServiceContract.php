<?php

namespace App\Services\Contracts;

use App\Repositories\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Service User Interface
 * @package App\Services\Contracts
 * @author Rafael Neris Cruz <rafaelneridj@gmail.com>
 */
interface UserServiceContract
{
    /**
     * @param array $userData
     * @return User|Model
     */
    public function create(array $userData);

    /**
     * @return array
     */
    public function getAll();

    /**
     * @param User $user
     * @return string
     */
    public function createToken(User $user);

    /**
     * @param string $userEmail
     * @param string $userPassword
     * @return bool
     */
    public function login($userEmail, $userPassword);

    /**
     * @param integer $id
     * @return mixed
     */
    public function getById($id);
}
