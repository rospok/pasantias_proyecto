<?php

namespace App\Providers;

use App\Interfaces\IAuthUser;
use App\Interfaces\UserManagementInterface;
use App\Services\AuthUserService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
                $this->app->bind(UserManagementInterface::class, UserService::class);
                $this->app->bind(IAuthUser::class, AuthUserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
