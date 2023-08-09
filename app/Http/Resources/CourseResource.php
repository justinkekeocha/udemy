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
            'rating' => $this->rating,
            'ratings_count' => $this->ratings_count,
            'price' => $this->price,
            'inflated_price' => $this->inflated_price,
            'link' => $this->link,
            'topic_id' => $this->topic_id,
            'topic' => $this->topic,
            'sub_category_id' => $this->topic->subCategory->id,
            'category_id' => $this->topic->subCategory->category->id,
            'instructor' => new UserResource($this->instructor),
            'subCategory' => new SubCategoryResource($this->topic->subCategory),
            'category' => new CategoryResource($this->topic->subCategory->category),
            'updated_at' => $this->updated_at
        ];
    }
}
