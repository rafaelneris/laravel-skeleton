<?php

namespace App\Filters\Users;

use App\Filters\DefaultInputFilter;

/**
 * Class LoginInputFilter
 * @package App\Filters\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class LoginInputFilter extends DefaultInputFilter
{
    /** @var array  */
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    /** @var array  */
    protected $messages = [
        'email.required' => 'The e-mail field is required.',
        'password.required' => 'The password field is required.'
    ];
}
