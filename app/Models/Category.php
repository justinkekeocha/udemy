<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'name';
    }

    //Relationships
    public function subCategories(){
        return $this->hasMany(SubCategory::class);
    }
}
