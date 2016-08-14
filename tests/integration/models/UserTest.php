<?php

use fooCart\Core\User\AdminUser;
use fooCart\Core\User\RegisteredUser;
use fooCart\Core\User\TempUser;
use fooCart\Core\User\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    protected $adminUser;
    protected $registeredUser;
    protected $tempUser;

    public function setUp()
    {
        parent::setUp();
        $this->adminUser = User::getUserById(1);
        $this->registeredUser = User::getUserById(2);
        $this->tempUser = User::getUserById(3);
    }

    /**
     * Test the getUserById method returns the appropriate model.
     *
     * @return void
     */
    public function testAdminUserIsReturned()
    {
        $this->assertInstanceOf(AdminUser::class, $this->adminUser);
    }

    /**
     * Test the getUserById method returns the appropriate model.
     *
     * @return void
     */
    public function testRegisteredUserIsReturned()
    {
        $this->assertInstanceOf(RegisteredUser::class, $this->registeredUser);
    }

    /**
     * Test the getUserById method returns the appropriate model.
     *
     * @return void
     */
    public function testTempUserIsReturned()
    {
        $this->assertInstanceOf(TempUser::class, $this->tempUser);
    }

    /**
     * Test that the User::isAdminUser() method behaves as expected.
     */
    public function testIsAdminUserMethodWorks()
    {
        $this->assertTrue($this->adminUser->isAdminUser());
        $this->assertFalse($this->adminUser->isRegisteredUser());
        $this->assertFalse($this->adminUser->isTempUser());
    }

    /**
     * Test that the User::isRegisteredUser() method behaves as expected.
     */
    public function testIsRegisteredUserMethodWorks()
    {
        $this->assertFalse($this->registeredUser->isAdminUser());
        $this->assertTrue($this->registeredUser->isRegisteredUser());
        $this->assertFalse($this->registeredUser->isTempUser());
    }

    /**
     * Test that the User::isTempUser() method behaves as expected.
     */
    public function testIsTempUserMethodWorks()
    {
        $this->assertFalse($this->tempUser->isAdminUser());
        $this->assertFalse($this->tempUser->isRegisteredUser());
        $this->assertTrue($this->tempUser->isTempUser());
    }
}
