<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory, HasRelationships;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relationships
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function topics()
    {
        return $this->hasManyThrough(Topic::class, SubCategory::class);
    }

    public function courses()
    {
        //https://github.com/staudenmeir/eloquent-has-many-deep#hasmany
        return $this->hasManyDeep(Course::class, [SubCategory::class, Topic::class]);
    }

    public function instructors()
    {
        return $this->hasManyDeep(
            User::class,
            [SubCategory::class, Topic::class, Course::class],
            [
                'category_id',
                'sub_category_id',
                'topic_id',
                'id'
            ],
            [
                'id',
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
            get: fn () => route('categories.show', ['category' => $this->slug])
        );
    }
}
