<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Coupon extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'type',
        'value',
        'user_id',
        'order_id',
        'product_id',
        'booking_id',
        'package_id',
        'expiry_date',
        'valid_for_times',
        'isValid',
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'expiry_date',
        'start_date',
    ];


    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     *
     */
    public function scopeValid($query) {
        return $query->where('valid_for_times', '>', 0);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
