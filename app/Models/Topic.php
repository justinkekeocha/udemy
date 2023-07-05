<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Topic extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relationships
    protected $with = ['subCategory'];

    public function category(): HasOneThrough
    {
        return $this->hasOneThrough(Category::class, SubCategory::class, 'id', 'id', 'sub_category_id', 'category_id');
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    //Attributes
    protected function link(): Attribute
    {
        return Attribute::make(
            get: fn () => route('topics.show', ['topic' => $this->slug])
        );
    }
}
