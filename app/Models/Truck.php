<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Package;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Truck extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ar_name',
        'en_name',
        'ar_slug',
        'en_slug',
        'ar_type',
        'en_type',
        'ar_note',
        'en_note',
        'size',
        'status',
        'min_price_per_event',
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


    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    // active Section scope
    public function scopeActive($query): Query
    {
        return $query->where('status', '=', 'active');
    }

    /**
     *
     */
    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class, 'truck_package', 'truck_id', 'package_id')
            ->withTimestamps()
            ->withPivot(['quantity', 'price']);
    }

    // morph relation
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }
}
