<?php

namespace fooCart\Providers;

use fooCart\Core\User\AdminUser;
use fooCart\Core\User\GuestUser;
use fooCart\Core\User\RegisteredUser;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class MorphMapServiceProvider extends ServiceProvider
{
    /**
     * Morph mapping for polymorphic Eloquent relationships
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'AdminUser' => AdminUser::class,
            'RegisteredUser' => RegisteredUser::class,
            'GuestUser' => GuestUser::class,
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
