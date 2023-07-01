<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory, HasRelationships;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relationships
    protected $with = ['subCategories', 'topics'];

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

    //Attributes
    protected function link(): Attribute
    {
        return Attribute::make(
            get: fn () => route('categories.show', ['category' => $this->slug])
        );
    }
}
