<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreLifeInsuranceRequest extends FormRequest
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
        'companyName' => ['required', 'string'],
        'insuranceType' => ['required', 'string'],
        'policyNumber' => ['required', 'string'],
        'maturityDate' => ['required', 'date'],
        'premium' => ['nullable', 'integer'],
        'sumInsured' => ['nullable', 'integer'],
        'policyHolderName'=>['required','string'],
        'contactPerson'=>['nullable','string'],
        'modeOfPurchase'=>['required'],
        'brokerName'=>['sometimes','string'],
        'registeredMobile'=>['sometimes','regex:/^\+(?:\d{1}|\d{3})(?:\x20?\d){5,14}\d$/'],
        'registeredEmail'=>['sometimes','email:rfc,dns'],
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        throw new HttpResponseException(response()->json(['success'=>false, 'message' => $errors], 422));
    }
}
