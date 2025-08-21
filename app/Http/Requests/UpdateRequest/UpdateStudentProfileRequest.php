<?php

namespace App\Http\Requests\UpdateRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentProfileRequest extends FormRequest
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
            'user_id' => ['sometimes', 'exists:users,id'],
            'studying_subjects' => ['nullable', 'array'],
            'studying_subjects.*' => ['string'],
            'progress' => ['nullable', 'string'],
            'certificates_received' => ['nullable', 'array'],
            'certificates_received.*' => ['string'],
        ];
    }
}
