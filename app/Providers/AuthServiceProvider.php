<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        Passport::tokensExpireIn(now()->addSecond(60));

        Passport::tokensCan([
            'create_post' => 'crear un post',
            'read_post' => 'ver un post',
            'update_post' => 'actualizar post',
            'delete_post' => 'eliminar un post'
        ]);

        Passport::setDefaultScope([
            'read_post'
        ]);
    }
}
