<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoutineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function wantsJson(): bool
    {
        return true;
    }

    public function expectsJson(): bool
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
            'user_id' => ['exists:users,id','gt:0','numeric'],
            'routine_name' => ['required','string','max:255'],
            'routine_description' => ['required','string','max:255'],
            'routine_duration' => ['required','string','max:255'],
            'routine_type' => ['required', 'string', 'max:255'],
            'recommended_weight' => ['required','string','max:255'],
            'recommended_BMI' => ['required','string','max:255'],
            'recommended_blood_pressure' => ['required','string','max:255'],
            'recommended_blood_sugar' => ['required','string','max:255'],
        ];
    }

    public function validatedRoutine(): array
    {
        return $this->only('routine_name','routine_description','routine_duration','routine_type','recommended_weight','recommended_BMI','recommended_blood_pressure','recommended_blood_sugar', 'user_id');
    }
}
