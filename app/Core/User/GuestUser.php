<?php


namespace fooCart\Core\User;

use fooCart\Core\Invoice\Invoice;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GuestUser
 * @package fooCart\Core\User
 */
class GuestUser extends Model
{
    /**
     * @var string
     */
    protected $table = 'guest_users';

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

    /**
     * Define the relationship to invoice.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function invoices()
    {
        return $this->morphOne(Invoice::class, 'userable');
    }
}