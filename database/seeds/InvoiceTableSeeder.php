<?php

use Carbon\Carbon;
use fooCart\Core\Invoice\Invoice;
use Illuminate\Database\Seeder;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoices = [
            //Registered Users
            [
                'userable_id' => 1,
                'userable_type' => 'RegisteredUser',
                'status_id' => 1,
                'completed_on' => Carbon::today()->toDayDateTimeString(),
                'bankcard_id' => 1,
                'promo_code_id' => 2
            ],
            [
                'userable_id' => 2,
                'userable_type' => 'RegisteredUser',
                'status_id' => 1,
                'completed_on' => Carbon::today()->toDayDateTimeString(),
                'bankcard_id' => 1,
                'promo_code_id' => null
            ],
            [
                'userable_id' => 3,
                'userable_type' => 'RegisteredUser',
                'status_id' => 1,
                'completed_on' => Carbon::today()->toDayDateTimeString(),
                'bankcard_id' => 2,
                'promo_code_id' => 4
            ],

            //Guest Users
            [
                'userable_id' => 1,
                'userable_type' => 'GuestUser',
                'status_id' => 3,
                'completed_on' => null,
                'bankcard_id' => null
            ],
            [
                'userable_id' => 2,
                'userable_type' => 'GuestUser',
                'status_id' => 3,
                'completed_on' => null,
                'bankcard_id' => null
            ],
            [
                'userable_id' => 3,
                'userable_type' => 'GuestUser',
                'status_id' => 3,
                'completed_on' => null,
                'bankcard_id' => null
            ],
            [
                'userable_id' => 4,
                'userable_type' => 'GuestUser',
                'status_id' => 3,
                'completed_on' => null,
                'bankcard_id' => null
            ],
            [
                'userable_id' => 5,
                'userable_type' => 'GuestUser',
                'status_id' => 3,
                'completed_on' => null,
                'bankcard_id' => null
            ],
        ];

        foreach ($invoices as $invoice) {
            Invoice::create($invoice);
        }
    }
}
