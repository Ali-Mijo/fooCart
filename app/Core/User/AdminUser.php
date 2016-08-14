<?php


namespace fooCart\Core\User;


/**
 * Class AdminUser
 * @package fooCart\Core\User
 */
class AdminUser extends User
{

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Create an administrative user.
     *
     * @param array $userData
     * @return static
     */
    public static function create(array $userData = [])
    {
        $userData['role_id'] = 3;
        return parent::create($userData);
    }

}