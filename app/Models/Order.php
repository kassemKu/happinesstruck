<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_number',
        'status',
        'grand_total',
        'item_count',
        'is_paid',
        'payment_method',
        'user_id',

        'shipping_full_name',
        'shipping_address',
        'shipping_country',
        'shipping_city',
        'shipping_area',
        'shipping_avenue',
        'shipping_state',
        'shipping_zip_code',
        'shipping_phone',
        'notes',

        'billing_full_name',
        'billing_address',
        'country_id',
        'city_id',
        'billing_state',
        'billing_avenue',
        'area_id',
        'billing_zip_code',
        'billing_phone',

        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo('App\Models\City');
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo('App\Models\area');
    }
}
