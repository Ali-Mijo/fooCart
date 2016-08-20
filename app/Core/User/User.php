<?php

namespace fooCart\Core\User;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package fooCart\Core\User
 */
class User extends Authenticatable
{
    /**
     * The attributes that are not assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'userable_type',
        'userable_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Define relationship to user type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function userable()
    {
        return $this->morphTo();
    }

    /**
     * Determine if user is registered.
     *
     * @return bool
     */
    public function isRegisteredUser()
    {
        return ('RegisteredUser' == $this->userable_type) ? true : false;
    }

    /**
     * Determine the user is an admin.
     *
     * @return bool
     */
    public function isAdminUser()
    {
        return ('AdminUser' == $this->userable_type) ? true : false;
    }
}
