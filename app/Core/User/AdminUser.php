<?php


namespace fooCart\Core\User;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class AdminUser
 * @package fooCart\Core\User
 */
class AdminUser extends Authenticatable
{


    /**
     * @var string
     */
    protected $table = 'admin_users';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Polymorphic relationship to User class.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

}