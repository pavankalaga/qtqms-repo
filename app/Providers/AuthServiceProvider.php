<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        // if (! app()->runningInConsole()) {
        //     $roles = Role::with('permission')->get();
        //     $permissionArray = [];
        //     foreach ($roles as $role) {
        //         foreach ($role->permission as $permission) {
        //             $permissionArray[$permission->slug][] = $role->id;
        //         }
        //     }

        //     foreach ($permissionArray as $title => $roles) {
        //         Gate::define($title, function (User $user) use ($roles) {                    
        //             $c = array_intersect($user->role->pluck('id')->toArray(), $roles);
        //             return (count($c) > 0);
        //         });
        //     }
        // }
    }
}
