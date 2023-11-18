<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
use ArgumentCountError;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('edit-comment', function ($user, $commentUser) {
            return $user->id == $commentUser->id;
        });

        Gate::before(function ($user) {
            if ($user->is_superuser) {
                return true;
            }
        });

        foreach (Permission::all() as $permission) {

            if (str_starts_with($permission->name, 'details-') || str_starts_with($permission->name, 'review-') || str_starts_with($permission->name, 'gallery-') || str_starts_with($permission->name, 'edit-')) {
                Gate::define($permission->name, function ($user, $thisUser) use ($permission) {
                    return $user->permissions->contains('name', $permission->name) || $user->roles->contains('name', $permission->role->name) || $thisUser->id == $user->id;
                });
            } else {
                Gate::define($permission->name, function ($user) use ($permission) {
                    return $user->permissions->contains('name', $permission->name) || $user->roles->contains('name', $permission->role->name);
                });
            }
        }


    }
}
