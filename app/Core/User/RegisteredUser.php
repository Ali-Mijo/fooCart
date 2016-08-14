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

    protected $guarded = ['active'];

    /**
     * Create a registered user.
     *
     * @param array $userData
     * @return static
     */
    public function update(array $userData = [])
    {
        $userData['role_id'] = 2;
        $user = parent::update($userData);
        //TODO - Broadcast registerdUserCreated event
        //TODO - Transfer cart from temp user to reg user
        //TODO - Send welcome email
        return $user;
    }
}