<?php


namespace fooCart\Core\User;


/**
 * Class RegisteredUser
 * @package fooCart\Core\User
 */
class RegisteredUser extends User
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * Create a registered user.
     *
     * @param array $userData
     * @return static
     */
    public static function create(array $userData)
    {
        $userData['role_id'] = 2;
        $user = parent::create($userData);
        //TODO - Broadcast registerdUserCreated event
        //TODO - Transfer cart from temp user to reg user
        //TODO - Send welcome email
        return $user;
    }
}