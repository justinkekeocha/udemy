<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubCategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'price' => number_format($this->price),
            'inflated_price' => number_format($this->price * 13),
            'link' => $this->link,
            'sub_category_id' => $this->sub_category_id,
            'category_id' => $this->category->id,
            'category' => new CategoryResource($this->category),
            'subCategory' => new SubCategoryResource($this->subCategory),
            'instructor' => new UserResource($this->instructor),
        ];
    }
}
