<?php

namespace App\Http\Controllers\Auth;

use App\Http\JsonResponseTrait;
use App\Services\Contracts\UserServiceContract;
use Exception;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\Auth
 * @author  Rafael Neris  <rafaelnerisdj@gmail.com>
 */
class UserController extends Controller
{
    use JsonResponseTrait;

    /** @var UserServiceContract */
    private $userService;

    /**
     * UserController constructor.
     * @param UserServiceContract $userService
     */
    public function __construct(
        UserServiceContract $userService
    ) {
        $this->userService = $userService;
    }

    /**
     * @return JsonResponse
     */
    public function details()
    {
        $user = Auth::user();
        return $this->response([$user], StatusCodeInterface::STATUS_OK);
    }

    /**
     * @return JsonResponse
     */
    public function list()
    {
        try {
            $data = $this->userService->getAll();
            return $this->response($data, StatusCodeInterface::STATUS_OK);
        } catch (Exception $e) {
            return $this->response(
                ['error' => 'Erro ao obter lista de usuários'.$e->getMessage()],
                StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * @param integer $id
     * @return JsonResponse
     */
    public function findById($id)
    {
        try {
            $user = $this->userService->getById($id);
            return $this->response($user, StatusCodeInterface::STATUS_OK);
        } catch (Exception $e) {
            return $this->response(
                ['Erro ao buscar usuário'],
                StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR
            );
        }
    }
}
