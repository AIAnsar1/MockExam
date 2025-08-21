<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamsResource extends JsonResource
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
            'course' => new CoursesResource($this->whenLoaded('course')),
            'questions' => QuestionsResource::collection($this->whenLoaded('questions')),
            'exam_attempts' => ExamAttemptsResource::collection($this->whenLoaded('examAttempts')),
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'duration_minutes' => $this->duration_minutes,
            'attempts_allowed' => $this->attempts_allowed,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
