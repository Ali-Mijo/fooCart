<?php

use fooCart\Core\User\RegisteredUser;
use Illuminate\Database\Seeder;

class RegisteredUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regUsers = [
            [
                'first_name' => 'Justin',
                'last_name' => 'Christenson',
                'active' => true
            ],
            [
                'first_name' => 'John',
                'last_name' => 'Dojo',
                'active' => true
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Dojo',
                'active' => false
            ],
        ];

        foreach ($regUsers as $user) {
            RegisteredUser::create($user);
        }
    }
}
