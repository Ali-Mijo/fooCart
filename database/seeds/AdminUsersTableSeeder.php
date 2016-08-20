<?php

use fooCart\Core\User\AdminUser;
use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUsers = [
            [
                'created_by' => 1,
                'active' => true
            ],
            [
                'created_by' => 1,
                'active' => true
            ],
            [
                'created_by' => 2,
                'active' => false
            ],
        ];

        foreach ($adminUsers as $user) {
            AdminUser::create($user);
        }
    }
}
