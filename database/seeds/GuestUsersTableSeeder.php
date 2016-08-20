<?php

use fooCart\Core\User\GuestUser;
use Illuminate\Database\Seeder;

class GuestUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = range(1, 20);

        foreach ($ids as $user) {
            GuestUser::create(['id' => $user]);
        }
    }
}
