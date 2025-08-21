<?php

namespace App\Http\Requests\UpdateRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'about_project' => 'sometimes|required|array',
            'teams' => 'sometimes|required|array',
            'social_media' => 'sometimes|required|array',
            'mission' => 'nullable|array',
            'contacts' => 'nullable|array',
            'partners' => 'nullable|array',
            'faq' => 'nullable|array',
            'policies' => 'nullable|array',
        ];
    }
}
