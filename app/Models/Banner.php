<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Facade\Ignition\QueryRecorder\Query;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable=[
        'ar_title',
        'ar_slug',
        'ar_description',
        'en_title',
        'en_slug',
        'en_description',
        'image',
        'status'
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

    // published product scope
    public function scopePublished($query): Query
    {
        return $query->where('status', '=', 'active');
    }
}
