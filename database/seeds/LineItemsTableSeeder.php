<?php

use fooCart\Core\Invoice\Item\LineItem;
use Illuminate\Database\Seeder;

class LineItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lineItems = [
            [
                'type' => 'addition',
                'description' => 'Test line item 1',
                'shipment_id' => 1,
                'invoice_id' => 1,
                'amount' => 12.00
            ],
            [
                'type' => 'discount',
                'description' => 'Test line item 1',
                'shipment_id' => 2,
                'invoice_id' => 1,
                'amount' => 4.00
            ],
            [
                'type' => 'addition',
                'description' => 'Test line item 1',
                'shipment_id' => 3,
                'invoice_id' => 2,
                'amount' => 2.00
            ],
            [
                'type' => 'discount',
                'description' => 'Test line item 1',
                'shipment_id' => 4,
                'invoice_id' => 3,
                'amount' => 20.00
            ]
        ];

        foreach ($lineItems as $lineItem) {
            LineItem::create($lineItem);
        }
    }
}
