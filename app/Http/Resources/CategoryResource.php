<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\SubCategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        //For eager loading children relationships
        //Since children relationships are not defined by default on the model
        //https://laravel.com/docs/10.x/eloquent-resources#conditional-relationships
        return [
            'id' => $this->id,
            'title' => $this->title,
            'link' => $this->link,
            'image' => $this->image,
            'subCategories' => SubCategoryResource::collection($this->whenLoaded('subCategories')),
            'topics' => TopicResource::collection($this->whenLoaded('topics')),
        ];
    }
}
