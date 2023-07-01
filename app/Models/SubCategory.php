<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class SubCategory extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relationships
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }
    public function courses(): HasManyThrough
    {
        return $this->hasManyThrough(Course::class, Topic::class);
    }

    //Attributes
    protected function link(): Attribute
    {
        return Attribute::make(
            get: fn () => route('subCategories.show', ['subCategory' => $this->slug])
        );
    }
}
