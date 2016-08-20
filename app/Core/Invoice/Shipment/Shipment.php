<?php

namespace fooCart\Core\Invoice\Shipment;

use fooCart\Core\Invoice\Invoice;
use fooCart\Core\Invoice\Item\InvoiceItem;
use fooCart\Core\Invoice\Item\LineItem;
use fooCart\Core\Location\Address;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'items',
    ];
    /**
     * Define the relationship to the invoice.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Define the relationship to the invoice items.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    /**
     * Define the relationship to line items.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lineItems()
    {
        return $this->hasMany(LineItem::class);
    }

    /**
     * Define the relationship to an address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Get the total amount for all items in the shipment.
     *
     * @return float
     */
    public function getShipmentTotal()
    {
        $total = array_reduce($this->items->all(), function($carry, $item)
        {
            $carry += $item->shipping_total;
            return $carry;
        }, 0);
        return ($total < 0) ? 0 : $total;
    }
}
