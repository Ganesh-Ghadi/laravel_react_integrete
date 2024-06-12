<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateMotorInsuranceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'companyName' => ['required', 'string'],
            'insuranceType' => ['required', 'string'],
            'policyNumber' => ['required', 'string'],
            'expiryDate'=>['required','date'],
            'insurerName'=>['required','string'],
            'vehicleType'=>['required','string'],
            'modeOfPurchase'=>['required'],
            'brokerName'=>['sometimes','string'],
            'registeredEmail'=>['sometimes','email:rfc,dns'],
            'registeredMobile'=>['sometimes','regex:/^\+(?:\d{1}|\d{3})(?:\x20?\d){5,14}\d$/'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        throw new HttpResponseException(response()->json(['success'=>false, 'message' => $errors], 422));
    }

}
