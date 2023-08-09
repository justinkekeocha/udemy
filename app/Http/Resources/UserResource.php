<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'link' => $this->link,
            'image' => $this->image,
            'about' => $this->about,
            'instructed_courses_count' => $this->instructed_courses_count,
            'instructed_courses' => CourseResource::collection($this->whenLoaded('instructedCourses')),
        ];
    }
}
