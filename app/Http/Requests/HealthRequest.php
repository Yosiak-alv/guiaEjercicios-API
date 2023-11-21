<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthRequest extends FormRequest
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
            'weight' => ['required','string','max:255'],
            'height' => ['required','string','max:255'],
            'bmi' => ['required','string','max:255'],
            'blood_pressure' => ['required','string','max:255'],
            'blood_sugar' => ['required','string','max:255'],
            'date' => ['required', 'date'],
        ];
    }

    public function validatedHealth(): array
    {
        return $this->only('weight','height','blood_pressure','blood_sugar','date','user_id', 'bmi');
    }

}
