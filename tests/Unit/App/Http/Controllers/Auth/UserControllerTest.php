<?php

namespace Tests\Unit\App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\UserController;
use App\Services\Contracts\UserServiceContract;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

/**
 * Teste unitário User
 * Class UserControllerTest
 * @package Tests\Unit\App\Http\Controllers\Auth
 */
class UserControllerTest extends TestCase
{

    /** @var UserServiceContract  */
    private $userService;

    /** @var UserController */
    private $userController;

    public function setUp()
    {
        parent::setUp();

        /** @var UserServiceContract userService */
        $this->userService = $this->app->make('App\Services\Contracts\UserServiceContract');
        $this->userController = $this->app->make('App\Http\Controllers\Auth\UserController');
    }

    public function testObjectCanBeConstructed()
    {
        $this->assertInstanceOf(UserController::class, $this->userController);
    }

    /**
     * @depends testObjectCanBeConstructed
     */
    public function testDetailsReturnsJson()
    {
        $jsonResponse = $this->userController->details();
        $this->assertInstanceOf(JsonResponse::class, $jsonResponse);
    }
}
