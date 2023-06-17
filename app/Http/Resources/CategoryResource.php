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
        return [
            'id' => $this->id,
            'title' => $this->title,
            'link' => $this->link,
            'subCategories' => SubCategoryResource::collection($this->subCategories),
        ];
    }
}
