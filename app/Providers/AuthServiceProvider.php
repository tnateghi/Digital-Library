<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        try {
            DB::connection()->getPdo();
            if(DB::connection()->getDatabaseName()){
                foreach ($this->getPermissions() as $permission) {
                    Gate::define($permission->name, function ($user) use ($permission) {
                        return $user->level == 'creator' or $user->hasRole($permission->roles);
                    });
                }
            }

        } catch (\Exception $e) {

        }
    }

    protected function getPermissions()
    {
        if(DB::connection()->getDatabaseName()) {
            return Permission::with('roles')->get();
        }
    }
}
