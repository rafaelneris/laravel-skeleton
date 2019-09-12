<?php

namespace App\Http\Controllers\Auth;

use App\Filters\Users\LoginInputFilter;
use App\Http\Controllers\Controller;
use App\Http\JsonResponseTrait;
use App\Repositories\Models\User;
use App\Services\Contracts\UserServiceContract;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, JsonResponseTrait;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * @var LoginInputFilter
     */
    private $loginInputFilter;

    /**
     * @var UserServiceContract
     */
    private $userService;

    /**
     * LoginController constructor.
     * @param LoginInputFilter $loginInputFilter
     * @param UserServiceContract $userService
     */
    public function __construct(LoginInputFilter $loginInputFilter, UserServiceContract $userService)
    {
        $this->middleware('guest')->except('logout');
        $this->loginInputFilter = $loginInputFilter;
        $this->userService = $userService;
    }

    /**
     * Method to Login
     *
     * @param Request $request Request
     *
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $loginRequest = $request->all();
        $validator = $this->loginInputFilter->validate($loginRequest);

        if ($validator->fails()) {
            return $this->response(
                ['error' => $validator->errors()],
                StatusCodeInterface::STATUS_BAD_REQUEST
            );
        }

        $userEmail = request('email');
        $userPassword = request('password');

        if (!$this->userService->login($userEmail, $userPassword)) {
            return $this->response(
                ['error' => 'Unauthorized'],
                StatusCodeInterface::STATUS_UNAUTHORIZED
            );
        }

        /** @var User $user */
        $user = Auth::user();

        $token = $this->userService->createToken($user);

        return $this->response(['token' => $token], StatusCodeInterface::STATUS_OK);
    }
}
