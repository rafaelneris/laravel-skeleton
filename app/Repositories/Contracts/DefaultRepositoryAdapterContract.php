<?php


namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface DefaultRepositoryAdapterContract
 * @package App\Repositories\Contracts
 * @author Rafael Neris Cruz <rafaelnerisdj@gmail.com>
 */
interface DefaultRepositoryAdapterContract
{

    /**
     * @return Model|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll();

    /**
     * @param integer $id
     * @return Model
     */
    public function findById($id);
}
