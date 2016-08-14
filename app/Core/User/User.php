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
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'role_id',
        'active'
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
     * Determine the user is a temp (unregistered) user.
     *
     * @return bool
     */
    public function isTempUser()
    {
        return (1 === $this->role_id) ? true : false;
    }

    /**
     * Determine if user is registered.
     *
     * @return bool
     */
    public function isRegisteredUser()
    {
        return (2 == $this->role_id) ? true : false;
    }

    /**
     * Determine the user is an admin.
     *
     * @return bool
     */
    public function isAdminUser()
    {
        return (3 === $this->role_id) ? true : false;
    }

    /**
     * Get an instance of the user model.
     * The instance reflects the user's role.
     *
     * @param $userId
     */
    public function getUserById($userId)
    {
        //TODO - Return an instance of the appropriate user model, depending on the role_id.
    }
}
