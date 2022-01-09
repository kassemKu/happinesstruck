<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Section extends Model
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
        'ar_description',
        'en_description',
        'published',
        'mediaIds',
        'ar_slug',
        'en_slug',
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

    // published Section scope
    public function scopePublished($query)
    {
        return $query->where('publish', '=', 1);
    }

    // relation to category
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    // morph relation
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('en_name', 'like', '%'.$search.'%')
                ->orWhere('ar_name', 'like', '%'.$search.'%')
                ->orWhere('ar_description', 'like', '%'.$search.'%')
                ->orWhere('en_description', 'like', '%'.$search.'%');
            });
        })
        ->when($filters['trashed'] ?? null, function($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }
}
