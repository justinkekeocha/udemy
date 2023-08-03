<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class SubCategory extends Model
{
    use HasFactory, HasRelationships;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relationships
    protected $with = ['category'];

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

    public function instructors()
    {
        return $this->hasManyDeep(
            User::class,
            [Topic::class, Course::class],
            [
                'sub_category_id',
                'topic_id',
                'id'
            ],
            [
                'id',
                'id',
                'instructor_id'
            ]
        )->distinct();
    }

    //Attributes
    protected function link(): Attribute
    {
        return Attribute::make(
            get: fn () => route('subCategories.show', ['category' => $this->category->slug, 'subCategory' => $this->slug])
        );
    }
}
