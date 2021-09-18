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

class Product extends Model
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
        'price',
        'sale_price',
        'supplier_percent_discount',
        'ar_short_description',
        'en_short_description',
        'ar_description',
        'en_description',
        'SKU',
        'stock_status',
        'featured',
        'quantity',
        'published',
        'category_id',
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

    // published product scope
    public function scopePublished($query): Query
    {
        return $query->where('publish', '=', 1);
    }

    // relation to category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // morph relation
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    // title english name as capitalize
    public function getEnNameAttribute($value) {
        return Str::title($value);
    }

    // TODO:: To fix set  attribute vis model slug attributes
    // public function setArSlugAttribute($ar_name) {
    //     return $this->attributes['ar_slug'] = 'slug1';
    // }

    // public function setEnSlugAttribute($en_name) {
    //     return $this->attributes['en_slug'] = 'slug2';
    // }

    // set stock status by product quantity
    // public function setStockStatusAttribute($quantity) {
    //     if((int)$quantity <= 0) {
    //         return $this->attributes['stock_status'] = 'out_stock';
    //     } elseif((int)$quantity <= 10 ) {
    //         return $this->attributes['stock_status'] = 'low_in_stock';
    //     }

    //     return $this->attributes['stock_status'] = 'in_stock';
    // }

    public function scopeFilter($query, array $filters): void
    {
        $query->when($filters['search'] ?? null, function($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%');
            });
        })
        ->when($filters['category'] ?? null, function($query, $category) {
            $query->where('category_id', $category)->get();
        });
    }

}
