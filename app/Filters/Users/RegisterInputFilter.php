<?php

namespace App\Filters\Users;

use App\Filters\DefaultInputFilter;

/**
 * Class RegisterInputFilter
 * @package App\Filters\Users
 * @author Rafael Neris
 */
class RegisterInputFilter extends DefaultInputFilter
{
    /** @var array  */
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'c_password' => 'required|same:password',
        'role_id' => 'required'
    ];

    /** @var array  */
    protected $messages = [
        'name.required' => 'The name field is required.',
        'email.required' => 'The e-mail field is required.',
        'password.required' => 'The password field is required.',
        'c_password.required' => 'The confirmation password field is required.',
        'role_id.required' => 'The role of user field is required'
    ];
}
