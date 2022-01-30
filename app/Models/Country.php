<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\City;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
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
        'published',
        'ar_slug',
        'en_slug',
        'user_id',
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

    // published category scope
    public function scopeAvailable($query): Query
    {
        return $query->where('status', '=', 'available');
    }

    // relation to user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // relation to city
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
