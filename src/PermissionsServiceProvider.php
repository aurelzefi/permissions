<?php

namespace Permissions;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

            $this->publishes([
                __DIR__.'/../config/permissions.php' => config_path('permissions.php'),
            ], 'permissions-config');
        }

        foreach (config('permissions') ?? [] as $permission) {
            Gate::define($permission, function ($user) use ($permission) {
                return in_array($permission, $user->permissions);
            });
        }
    }
}
