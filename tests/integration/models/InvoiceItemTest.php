<?php

use fooCart\Core\Invoice\Item\InvoiceItem;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvoiceItemTest extends TestCase
{
    /**
     * Test the getTaxTotal method is accurate.
     *
     * @return void
     */
    public function testInvoiceItemTaxTotalIsAccurate()
    {
        $this->assertEquals(36.1, InvoiceItem::find(1)->getTaxTotal());
    }

    /**
     * Test that the getPromotionTotal method is accurate for amount.
     *
     */
    public function testGetAmountPromotionTotalIsAccurate()
    {
        $this->assertEquals(20, InvoiceItem::find(1)->getPromotionTotal());
    }

    /**
     * Test that the getPromotionTotal method is accurate for percent.
     *
     */
    public function testGetPercentPromotionTotalIsAccurate()
    {
        $this->assertEquals(60.0, InvoiceItem::find(2)->getPromotionTotal());
    }

    /**
     * Test that the getPriceTotal method is accurate.
     *
     */
    public function testGetPriceTotalIsAccurate()
    {
        $this->assertEquals(1976.2, InvoiceItem::find(1)->getPriceTotal());
    }

    /**
     * Test that the getPriceSubTotal method is accurate
     */
    public function testGetPriceSubTotalIsAccurate()
    {
        $this->assertEquals(1900, InvoiceItem::find(1)->getPriceSubTotal());
    }
}
