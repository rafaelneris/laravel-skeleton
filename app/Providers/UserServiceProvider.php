<?php

namespace App\Providers;

use App\Repositories\Adapters\UserRepositoryAdapter;
use App\Repositories\Contracts\UserRepositoryAdapterContract;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\Models\User;
use App\Repositories\UserRepository;
use App\Services\Contracts\UserServiceContract;
use App\Services\UserService;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

/**
 * Class UserServiceProvider to dependency injection
 * @package App\Providers
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserServiceContract::class, function (Application $app) {
            $userRepository = $app->make(UserRepositoryContract::class);
            return new UserService($userRepository);
        });

        $this->app->bind(UserRepositoryAdapterContract::class, function (Application $app) {
            $userModel = new User();
            return new UserRepositoryAdapter($userModel);
        });

        $this->app->singleton(UserRepositoryContract::class, function (Application $app) {
            $adapter = $app->make(UserRepositoryAdapterContract::class);
            return new UserRepository($adapter);
        });
    }
}
