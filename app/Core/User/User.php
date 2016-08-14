<?php

namespace fooCart\Core\User;

use Exception;
use fooCart\Core\Exceptions\InvalidUserRoleException;
use fooCart\Core\Exceptions\UserNotFoundException;
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
        return (1 == $this->role_id) ? true : false;
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
        return (3 == $this->role_id) ? true : false;
    }

    /**
     * Factory method for returning user model by role.
     * The instance of the model reflects the user's role.
     *
     * @param $userId
     * @return AdminUser|RegisteredUser|TempUser|null
     * @throws InvalidUserRoleException
     * @throws UserNotFoundException
     */
    public static function getUserById($userId)
    {
        try {
            $user = User::findOrFail($userId);
        } catch (Exception $e) {
            throw new UserNotFoundException($e->getMessage());
        }

        switch ($user->role_id) {
            case 1:
                return new TempUser($user->toArray());
                break;
            case 2:
                return new RegisteredUser($user->toArray());
                break;
            case 3:
                return new AdminUser($user->toArray());
                break;
            default:
                //TODO - Log this
                throw new InvalidUserRoleException();
        }
        return null;
    }
}
