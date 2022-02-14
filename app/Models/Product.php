<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Support\Str;
use App\Models\Category;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
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
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    // morph relation to media
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    // relation to coupons
    public function coupon(): HasOne
    {
        return $this->hasOne(Coupon::class, 'model');
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
                $query->where('en_name', 'like', '%'.$search.'%')
                ->orWhere('en_description', 'like', '%'.$search.'%')
                ->orWhere('ar_name', 'like', '%'.$search.'%')
                ->orWhere('ar_description', 'like', '%'.$search.'%');
            });
        })
        ->when($filters['category'] ?? null, function($query, $category) {
            $cats = explode (",", $category);
            $query->whereHas('categories', function($query) use ($cats) {
                $query->whereIn('id', $cats);
            })->get();
        });
    }

}
