<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, HasRelationships;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relationships
    //Eager load only first parent relationships else there will be high chance of recursive loading and error
    protected $with = ['instructor', 'topic',];

    //protected $with = ['instructor', 'topic'];


    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }


    public function subCategory()
    {
        return $this->hasOneThrough(SubCategory::class, Topic::class, 'id', 'id', 'topic_id', 'sub_category_id');
    }

    public function category()
    {
        return $this->hasOneDeepFromReverse(
            (new Category())->courses()
        );
    }

    //Attributes
    protected function link(): Attribute
    {
        return Attribute::make(
            get: fn () => route('courses.show', ['course' => $this->slug])
        );
    }
}
