<?php

namespace App\Repositories\Contracts;

/**
 * Interface DefaultRepositoryContract
 * @package App\Repositories\Contracts
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface DefaultRepositoryContract
{

    /**
     * Retornar todos os registros
     * @return array
     */
    public function findAll();

    /**
     * Retornar um registro pelo ID
     * @param int $id
     * @return array
     */
    public function findById($id);
}
