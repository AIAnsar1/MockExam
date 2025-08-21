<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
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
            'about_project' => $this->about_project,
            'teams' => $this->teams,
            'social_media' => $this->social_media,
            'mission' => $this->mission,
            'contacts' => $this->contacts,
            'partners' => $this->partners,
            'faq' => $this->faq,
            'policies' => $this->policies,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
