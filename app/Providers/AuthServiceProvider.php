<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Brand' => 'App\Policies\BrandPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->registerUserPolicies();
        $this->registerRolePolicies();
        $this->registerPermissionPolicies();
    }

    /**
     * Gates for users management.
     * You may set the role(s) allowed to manage users (ADMIN_ROLES) in your
     * `.env` file, or assign one or more permissions to a single user.
     */
    protected function registerUserPolicies()
    {
        /**
         * Gate for Browse Users list.
         * User must have one `ADMIN_ROLES` or the `browse-users` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         */
        Gate::define('browse-users', function ($user) {
            return  $user->isAdmin() || $user->hasPermission('browse-users');
        });

        /**
         * Gate for view users page.
         * User must have one `ADMIN_ROLES` or the `view-users` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         * @param object $entity Current entity
         */
        Gate::define('view-users', function ($user, $entity) {
            return  $user->isAdmin() || $user->hasPermission('view-users') || $user->id == $entity->id;
        });

        /**
         * Gate for edit users.
         * User must have one `ADMIN_ROLES` or the `edit-users` permission
         * (user's can always edit own profile).
         *
         * @param object $user   Current logged in user (same as Auth::user())
         * @param object $entity Current entity
         */
        Gate::define('edit-users', function ($user, $entity) {
            return  $user->isAdmin() || $user->hasPermission('edit-users') || $user->id == $entity->id;
        });

        /**
         * Gate for create new users.
         * User must have one `ADMIN_ROLES` or the `create-users` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         * @param object $entity Current entity
         */
        Gate::define('create-users', function ($user) {
            return  $user->isAdmin() || $user->hasPermission('create-users');
        });

        /**
         * Gate for delete users.
         * User must have one `ADMIN_ROLES` or the `delete-users` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         * @param object $entity Current entity
         */
        Gate::define('delete-users', function ($user) {
            return  $user->isAdmin() || $user->hasPermission('delete-users');
        });
    }

    /**
     * Gates for Role management.
     * You may set the role allowed to manage roles (ADMIN_ROLE) in your
     * `.env` file, or assign one or more permissions to a single user.
     */
    protected function registerRolePolicies()
    {
        /**
         * Gate for Browse Roles list.
         * User must have one `ADMIN_ROLES` or the `browse-roles` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         */
        Gate::define('browse-roles', function ($user) {
            return  $user->isAdmin() || $user->hasPermission('browse-roles');
        });

        /**
         * Gate for view roles.
         * User must have one `ADMIN_ROLES` or the `view-roles` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         * @param object $entity Current entity
         */
        Gate::define('view-roles', function ($user, $entity) {
            return  $user->isAdmin() || $user->hasPermission('view-roles');
        });

        /**
         * Gate for edit roles.
         * User must have one `ADMIN_ROLES` or the `edit-roles` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         * @param object $entity Current entity
         */
        Gate::define('edit-roles', function ($user, $entity) {
            return  $user->isAdmin() || $user->hasPermission('edit-roles');
        });

        /**
         * Gate for create roles.
         * User must have one `ADMIN_ROLES` or the `create-roles` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         * @param object $entity Current entity
         */
        Gate::define('create-roles', function ($user) {
            return  $user->isAdmin() || $user->hasPermission('create-roles');
        });

        /**
         * Gate for delete roles.
         * User must have one `ADMIN_ROLES` or the `delete-roles` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         * @param object $entity Current entity
         */
        Gate::define('delete-roles', function ($user) {
            return  $user->isAdmin() || $user->hasPermission('delete-roles');
        });
    }

    /**
     * Gates for Permissions management.
     * You can set the role(s) allowed to manage permissions in your `.env` file.
     */
    protected function registerPermissionPolicies()
    {
        /**
         * Gate for Browse Permissions list.
         * User must have one `ADMIN_ROLES` or the `browse-permissions` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         */
        Gate::define('browse-permissions', function ($user) {
            return  $user->isAdmin() || $user->hasPermission('browse-permissions');
        });

        /**
         * Gate for view permissions.
         * User must have one `ADMIN_ROLES` or the `view-permissions` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         * @param object $entity Current entity
         */
        Gate::define('view-permissions', function ($user, $entity) {
            return  $user->isAdmin() || $user->hasPermission('view-permissions');
        });

        /**
         * Gate for edit permissions.
         * User must have one `ADMIN_ROLES` or the `edit-permissions` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         * @param object $entity Current entity
         */
        Gate::define('edit-permissions', function ($user, $entity) {
            return  $user->isAdmin() || $user->hasPermission('edit-permissions');
        });

        /**
         * Gate for create permissions.
         * User must have one `ADMIN_ROLES` or the `create-permissions` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         * @param object $entity Current entity
         */
        Gate::define('create-permissions', function ($user) {
            return  $user->isAdmin() || $user->hasPermission('create-permissions');
        });

        /**
         * Gate for delete permissions.
         * User must have one `ADMIN_ROLES` or the `delete-permissions` permission.
         *
         * @param object $user   Current logged in user (same as Auth::user())
         * @param object $entity Current entity
         */
        Gate::define('delete-permissions', function ($user) {
            return  $user->isAdmin() || $user->hasPermission('delete-permissions');
        });
    }
}
