<?php

use fooCart\Core\User\AdminUser;
use fooCart\Core\User\GuestUser;
use fooCart\Core\User\RegisteredUser;
use fooCart\Core\User\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    protected $adminUser;
    protected $registeredUser;
    protected $guestUser;

    public function setUp()
    {
        parent::setUp();
        $this->adminUser = User::find(1)->userable()->first();
        $this->registeredUser = User::find(4)->userable()->first();
        $this->guestUser = GuestUser::find(1);
    }

    /**
     * Test the getUserById method returns the appropriate model.
     *
     * @return void
     */
    public function testAdminUserIsReturnedFromUserModel()
    {
        $this->assertInstanceOf(AdminUser::class, $this->adminUser);
    }

    /**
     * Test the getUserById method returns the appropriate model.
     *
     * @return void
     */
    public function testRegisteredUserIsReturnedFromUserModel()
    {
        $this->assertInstanceOf(RegisteredUser::class, $this->registeredUser);
    }

    /**
     * Test that the User::isAdminUser() method behaves as expected.
     */
    public function testIsAdminUserMethodWorks()
    {
        $this->assertTrue($this->adminUser->user()->first()->isAdminUser());
        $this->assertFalse($this->adminUser->user()->first()->isRegisteredUser());
    }

    /**
     * Test that the User::isRegisteredUser() method behaves as expected.
     */
    public function testIsRegisteredUserMethodWorks()
    {
        $this->assertFalse($this->registeredUser->user()->first()->isAdminUser());
        $this->assertTrue($this->registeredUser->user()->first()->isRegisteredUser());
    }
}
