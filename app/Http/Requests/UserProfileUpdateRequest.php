<?php

namespace App\Http\Requests;

use App\Models\UserProfile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'nationality' => ['required'],
            'ethnicity' => ['required'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'phone' => ['required'],
            'marital_status' => ['required'],
            'height' => ['required'],
            'summary' => ['required'],
//            'email' => ['email', 'max:255', Rule::unique(UserProfile::class)->ignore($this->user()->id)],
        ];
    }
}
