<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use App\Models\Product;
use Illuminate\Support\Str;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'cost',
        'description',
        'media_ids',
        'slug',
        'started_at',
        'ended_at',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'started_at',
        'ended_at',
    ];


    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    // relation to category
    public function packageItems(): HasMany
    {
        return $this->hasMany(PackageItem::class);
    }

    // morph relation
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }
}
