<?php

namespace App\Filters\Contracts;

/**
 * Class InputFilterContract
 * @package App\Filters\Contracts
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface InputFilterContract
{

    /**
     * @return array
     */
    public function getRules();

    /**
     * @return array
     */
    public function getMessages();

    /**
     * @param array $input
     * @return \Illuminate\Validation\Validator
     */
    public function validate(array $input);
}
