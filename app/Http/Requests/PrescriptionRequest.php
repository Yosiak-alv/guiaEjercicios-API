<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrescriptionRequest extends FormRequest
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
            'disease_id' => ['required','exists:diseases,id','gt:0','numeric'],
            'user_id' => ['exists:users,id','gt:0','numeric'], 
            'medication_name' => ['required','string','max:255'],
            'dose_amount' => ['required','numeric','gt:0'],
            'dose_unit' => ['required','string','max:5'],
            'date' => ['required','date'],
            'each' => ['required','numeric','gt:0'],
            'next_dose' => 'date',
        ];
    }
    public function validatedPrescription(): array
    {
        return $this->only('disease_id','medication_name','dose_amount','dose_unit','date','each','user_id');
    }
}
