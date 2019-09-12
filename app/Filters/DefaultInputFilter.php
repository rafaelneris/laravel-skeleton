<?php

namespace App\Filters;

use App\Filters\Contracts\InputFilterContract;
use Illuminate\Support\Facades\Validator;

/**
 * Class DefaultInputFilter
 * @package App\Filters
 * @author Rafael Neris Cruz <rafaelnerisdj@gmail.com>
 */
abstract class DefaultInputFilter implements InputFilterContract
{

    /** @var array  */
    protected $messages = [];

    /** @var array  */
    protected $rules = [];

    /**
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param array $input
     * @return \Illuminate\Validation\Validator
     */
    public function validate(array $input)
    {
        return Validator::make($input, $this->getRules());
    }
}
