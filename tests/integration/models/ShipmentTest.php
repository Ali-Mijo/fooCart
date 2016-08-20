<?php

use fooCart\Core\Invoice\Shipment\Shipment;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShipmentTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testReturnTheTotalOfAllItemsInTheShipment()
    {
        $this->assertEquals(128.1, Shipment::find(1)->getShipmentTotal());
    }
}
