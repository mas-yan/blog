<?php

namespace App\Providers;

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

        Gate::define('manage_tags', function ($user) {
            return $user->hasAnyPermission([
                'tag_show',
                'tag_create',
                'tag_update',
                'tag_delete',
            ]);
        });

        Gate::define('manage_categories', function ($user) {
            return $user->hasAnyPermission([
                'category_show',
                'category_create',
                'category_update',
                'category_delete',
            ]);
        });

        Gate::define('manage_posts', function ($user) {
            return $user->hasAnyPermission([
                'post_show',
                'post_create',
                'post_update',
                'post_delete',
                'post_detail',
            ]);
        });

        Gate::define('manage_users', function ($user) {
            return $user->hasAnyPermission([
                'user_show',
                'user_create',
                'user_update',
                'user_delete',
                'user_detail',
            ]);
        });

        Gate::define('manage_menu', function ($user) {
            return $user->hasAnyPermission([
                'menu_show',
                'menu_create',
                'menu_update',
                'menu_delete',
            ]);
        });

        Gate::define('manage_sliders', function ($user) {
            return $user->hasAnyPermission([
                'slider_show',
                'slider_create',
                'slider_update',
                'slider_delete',
            ]);
        });

        Gate::define('manage_permissions', function ($user) {
            return $user->hasAnyPermission([
                'slider_show',
            ]);
        });
    }
}
