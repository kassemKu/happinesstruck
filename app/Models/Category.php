<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use App\Models\Product;
use Illuminate\Support\Str;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Category extends Model
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
        'ar_summary',
        'en_summary',
        'published',
        'media_ids',
        'ar_slug',
        'en_slug',
        'parent_id',
        'is_parent',
        'product_id',
        'section_id',
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
    public function scopePublished($query): Query
    {
        return $query->where('publish', '=', 1);
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

     /**
      *
      */
     public function products(): BelongsToMany {
         return $this->belongsToMany(Product::class, 'product_category');
     }

     public function section(): BelongsTo {
         return $this->belongsTo(Section::class);
     }

    public function scopeFilter($query, array $filters): void
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
