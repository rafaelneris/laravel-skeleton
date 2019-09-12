<?php

namespace App\Repositories\Adapters;

use App\Repositories\Contracts\UserRepositoryAdapterContract;
use App\Repositories\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepositoryAdapter
 * @package App\Repositories\Adapters
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserRepositoryAdapter extends DefaultAdapter implements UserRepositoryAdapterContract
{
    /** @var User */
    private $userModel;

    /**
     * UserRepositoryAdapter
     * @param User $userModel
     */
    public function __construct(
        User $userModel
    ) {
        $this->userModel = $userModel;
    }

    /**
     * @param array $data
     * @return User|object
     */
    public function create(array $data)
    {
        $userCreated = $this->userModel->create($data);
        return $userCreated;
    }

    /**
     * @return Model|Collection
     */
    public function findAll()
    {
        $userCollection = $this->userModel->get();
        return $userCollection;
    }

    /**
     * @param integer $id
     * @return Model
     */
    public function findById($id)
    {
        /** @var Model $userModel */
        $userModel = $this->userModel->where('id', $id)->get();
        return $userModel;
    }
}
