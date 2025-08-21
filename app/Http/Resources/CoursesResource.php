<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoursesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        parent::toArray($request);
        
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'created_by' => new UserResource($this->whenLoaded('creator')),
            'exams' => ExamsResource::collection($this->whenLoaded('exams')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
