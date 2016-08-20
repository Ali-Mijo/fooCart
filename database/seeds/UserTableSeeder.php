<?php

use fooCart\Core\User\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            //Admin Users
            [
                'email' => 'justin@justinc.me',
                'password' => bcrypt('password1'),
                'userable_id' => 1,
                'userable_type' => 'AdminUser'
            ],
            [
                'email' => 'admin.user1@justinc.me',
                'password' => bcrypt('password1'),
                'userable_id' => 2,
                'userable_type' => 'AdminUser'
            ],
            [
                'email' => 'admin.user2@justinc.me',
                'password' => bcrypt('password1'),
                'userable_id' => 3,
                'userable_type' => 'AdminUser'
            ],
            //Registered Users
            [
                'email' => 'info@justinc.me',
                'password' => bcrypt('password'),
                'userable_id' => 1,
                'userable_type' => 'RegisteredUser'
            ],
            [
                'email' => 'reg.user1@justinc.me',
                'password' => bcrypt('password'),
                'userable_id' => 2,
                'userable_type' => 'RegisteredUser'
            ],
            [
                'email' => 'reg.user2@justinc.me',
                'password' => bcrypt('password'),
                'userable_id' => 3,
                'userable_type' => 'RegisteredUser'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
