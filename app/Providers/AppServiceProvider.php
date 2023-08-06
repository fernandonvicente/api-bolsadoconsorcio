<?php

namespace App\Providers;

use App\Models\Api\RoleUser;
use App\Repositories\{
    SupportEloquentORM,
    OperatorEloquentORM,
    UserEloquentORM,
    QuotaCanceledEloquentORM,
    RoleUserEloquentORM
};
use App\Repositories\{
    SupportRepositoryInterface,
    OperatorRepositoryInterface,
    UserRepositoryInterface,
    QuotaCanceledRepositoryInterface,
    RoleUserRepositoryInterface
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SupportRepositoryInterface::class,
            SupportEloquentORM::class
        );

        $this->app->bind(
            OperatorRepositoryInterface::class,
            OperatorEloquentORM::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserEloquentORM::class
        );

        $this->app->bind(
            QuotaCanceledRepositoryInterface::class,
            QuotaCanceledEloquentORM::class
        );

        $this->app->bind(
            RoleUserRepositoryInterface::class,
            RoleUserEloquentORM::class
        );


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
