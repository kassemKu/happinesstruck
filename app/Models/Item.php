<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Support\Str;
use App\Models\Package;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ar_name',
        'en_name',
        'price_per_event',
        'ar_short_description',
        'en_short_description',
        'ar_description',
        'en_description',
        'SKU',
        'stock_status',
        'featured',
        'quantity',
        'status',
        'review',
        'ar_slug',
        'en_slug',
        'mediaIds',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $cast=['mediaIds'=>'array'];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    /// active items scope
    public function scopeActive($query): Query
    {
        return $query->where('status', '=', 'active');
    }

    // morph relation
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

     /**
     * The items that belong to the packahe.
     */
    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class, 'package_item')
            ->withTimestamps()
            ->withPivot(['quantity', 'price']);
    }

    // title english name as capitalize
    public function getEnNameAttribute($value) {
        return Str::title($value);
    }
}