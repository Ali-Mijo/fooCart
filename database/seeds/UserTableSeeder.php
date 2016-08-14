<?php

use fooCart\Core\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            [
                'email' => 'justin@justinc.me',
                'first_name' => 'Justin',
                'last_name' => 'Christenson',
                'password' => bcrypt('password1'),
                'role_id' => 3,
                'active' => true
            ],
            [
                'email' => 'john@justinc.me',
                'first_name' => 'John',
                'last_name' => 'Dojo',
                'password' => bcrypt('password2'),
                'role_id' => 2,
                'active' => true
            ],
            [
                'email' => 3 . '-' . uniqid() . '@foocart.dev',
                'password' => bcrypt(3 . '-' . uniqid() . '@foocart.dev'),
                'role_id' => 1,
                'active' => false
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
