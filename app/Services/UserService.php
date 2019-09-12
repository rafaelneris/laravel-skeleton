<?php

namespace App\Services;

use App\Repositories\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Services\Contracts\UserServiceContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserService
 * @package App\Services
 * @author Rafael Neris Cruz <rafaelnerisdj@gmail.com>
 */
class UserService implements UserServiceContract
{
    /**
     * @var UserRepositoryContract
     */
    private $userRepository;

    /**
     * UserService DI
     * @param UserRepositoryContract $userRepository
     */
    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $userData
     * @return User
     */
    public function create(array $userData)
    {
        $userData['password'] = $this->hashPassword($userData['password']);
        return $this->userRepository->create($userData);
    }

    /**
     * @param string $password
     * @return string
     */
    private function hashPassword($password)
    {
        return bcrypt($password);
    }

    /**
     * @param string $userEmail
     * @param string $userPassword
     * @return bool
     */
    public function login($userEmail, $userPassword)
    {
        if (!Auth::attempt(['email' => $userEmail, 'password' => $userPassword])) {
            return false;
        }

        return true;
    }

    /**
     * @param User $user
     * @return string
     */
    public function createToken(User $user)
    {
        return $user->createToken('App')->accessToken;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $data = $this->userRepository->findAll();
        return $data;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getById($id)
    {
        /** @var Model $userCollection */
        $userModel = ($this->userRepository->findById($id));
        return $userModel->first();
    }
}
