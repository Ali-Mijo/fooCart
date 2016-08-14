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

    protected $guarded = [];

    /**
     * Transform a temp user into a registered user.
     *
     * @param array $userData
     * @return static
     */
    public function update(array $userData = [])
    {
        $userData['role_id'] = 2;
        $userData['active'] = true;
        $user = parent::update($userData);
        //TODO - Broadcast registerdUserCreated event
        //TODO - Send welcome email
        return $user;
    }
}