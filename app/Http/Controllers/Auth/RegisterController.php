<?php

namespace App\Http\Controllers\Auth;

use App\Filters\Users\RegisterInputFilter;
use App\Http\JsonResponseTrait;
use App\Repositories\Models\User;
use App\Http\Controllers\Controller;
use App\Services\Contracts\UserServiceContract;
use Exception;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Auth
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, JsonResponseTrait;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * @var RegisterInputFilter
     */
    private $registerInputFilter;
    /**
     * @var UserServiceContract
     */
    private $userService;

    /**
     * Create a new controller instance.
     *
     * @param RegisterInputFilter $registerInputFilter
     * @param UserServiceContract $userService
     */
    public function __construct(RegisterInputFilter $registerInputFilter, UserServiceContract $userService)
    {
        $this->middleware('auth');
        $this->registerInputFilter = $registerInputFilter;
        $this->userService = $userService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $userRequest = $request->all();
        $validator = $this->registerInputFilter->validate($userRequest);

        if ($validator->fails()) {
            return $this->response(
                ['error' => $validator->errors()],
                StatusCodeInterface::STATUS_BAD_REQUEST
            );
        }

        try {
            /** @var User $userModel */
            $userModel = $this->userService->create($userRequest);
            $success['id'] = $userModel->id;

            return $this->response(
                $success,
                StatusCodeInterface::STATUS_CREATED
            );
        } catch (QueryException $qe) {
            return $this->response(
                ['error' => "Dados existentes na base. Favor verificar."],
                StatusCodeInterface::STATUS_BAD_REQUEST
            );
        } catch (Exception $e) {
            return $this->response(
                ['error' => 'Erro ao salvar usuário.'],
                StatusCodeInterface::STATUS_BAD_REQUEST
            );
        }
    }
}
