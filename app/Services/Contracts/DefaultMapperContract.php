<?php


namespace App\Services\Contracts;

use App\Entities\Contracts\EntityContract;

/**
 * Interface DefaultMapperContract
 * @package App\Services\Contracts
 * @author Rafael Neris Cruz <rafaelnerisdj@gmail.com>
 */
interface DefaultMapperContract
{
    /**
     * @param $data
     * @param EntityContract $entity
     * @return object|object
     */
    public function map($data, $entity);
}
