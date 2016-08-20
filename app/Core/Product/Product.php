<?php

namespace fooCart\Core\Product;

use Carbon\Carbon;
use fooCart\Core\Invoice\Shipment\ShippingOption;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
        'images',
        'manufacturer',
        'categories'
    ];

    /**
     * Define the relationship to the manufacturer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    /**
     * Define the relationship to the product shipping options.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function shippingOptions()
    {
        return $this->belongsToMany(ShippingOption::class, 'product_shipping_options')
            ->withPivot('shipping_cost', 'created_at', 'updated_at')
            ->withTimestamps();
    }

    /**
     * Define the relationship to the product images.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Define the relationship to the product categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    /**
     * Return active products
     *
     */
    public function scopeActive()
    {
        return $this->where(function($query)
        {
            $query->whereNull('expires_on');
            $query->orWhereDate('expires_on', '>', Carbon::today()->toDateString());
        })->whereDate('active_on', '<=', Carbon::today()->toDateString());
    }

    /**
     * Get products that are on sale.
     *
     * @return mixed
     */
    public function scopeOnSale()
    {
        return $this->active()->whereNotNull('sale_price');
    }

    /**
     * Get products that are not on sale.
     *
     * @return mixed
     */
    public function scopeNotOnSale()
    {
        return $this->active()->whereNull('sale_price');
    }
}
