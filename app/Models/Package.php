<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Support\Str;
use App\Models\Category;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Package extends Model
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
        'ar_short_description',
        'en_short_description',
        'ar_description',
        'en_description',
        'status',
        'truck_id',
        'ar_slug',
        'en_slug',
        'mediaIds',
        'price_per_event',
        'min_price_per_event',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $cast=['mediaIds'=>'array'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    // active package scope
    public function scopeActive($query): Query
    {
        return $query->where('status', '=', 'active');
    }

    // relation to truck
    public function truck(): BelongsTo
    {
        return $this->belongsTo(Truck::class);
    }

    // morph relation
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    /**
     * @return string
     */

     public function setArSlugAttribute() {
        return $this->attributes['ar_slug'] = Str::slug($this->attributes['ar_name']);
     }

     public function setEnSlugAttribute() {
        return $this->attributes['en_slug'] = Str::slug($this->attributes['en_name']);
     }
}
