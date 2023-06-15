<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relationships
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    //Attributes

    protected function link(): Attribute
    {
        return Attribute::make(
            get: fn () => route('subCategory.show', ['subCategory' => $this->slug])
        );
    }
}
