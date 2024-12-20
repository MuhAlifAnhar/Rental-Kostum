<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define('semuaRole', function (User $user) {
        return in_array($user->role_id, [1, 2]);
        });

        Gate::define('isAdmin', function (User $user){
            return $user->role_id === 1;
        });

        Gate::define('isSuper', function (User $user){
            return $user->role_id === 2;
        });
    }
}
