<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relationships
    protected $with = ['subCategories'];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function courses(): HasManyThrough
    {
        return $this->hasManyThrough(Course::class, SubCategory::class);
    }

    //Attributes
    protected function link(): Attribute
    {
        return Attribute::make(
            get: fn () => route('category.show', ['category' => $this->slug])
        );
    }
}
