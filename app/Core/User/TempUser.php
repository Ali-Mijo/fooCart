<?php


namespace fooCart\Core\User;


/**
 * Class TempUser
 * @package fooCart\Core\User
 */
class TempUser extends User
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $guarded = [
        'active'
    ];

    /**
     * Create a temp user.
     *
     * @return static
     */
    public static function create(array $userData = [])
    {
        $userData['email'] = 'tmp-' . uniqid() .'@' . env('TMP_USER_DOMAIN');
        $userData['password'] = bcrypt(uniqid());
        $userData['role_id'] = 1;
        $userData['active'] = true;
        return parent::create($userData);
    }

    /**
     * Get an instance of the current temp user (or create one).
     *
     * @param $userId
     * @return mixed
     */
    public static function getTempUser($userId)
    {
        if (!$userId) {
            return self::create();
        }

        return self::find($userId);
    }
}