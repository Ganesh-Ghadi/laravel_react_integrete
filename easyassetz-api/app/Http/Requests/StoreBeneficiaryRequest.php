<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBeneficiaryRequest extends FormRequest
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
        $dob = $this->input('dob');
        
        $age = Carbon::parse($dob)->age;
         if(!$age){
            $age = 20;
         }

        return [
            'fullLegalName'=>['sometimes','string'],
            'guardianCity' => [
                $age < 18 ? 'required' : 'nullable',
                'string',
            ],
            'guardianName'=> [
                $age < 18 ? 'required' : 'nullable',
                'string',
            ],
            'guardianMobile'=>[
                $age < 18 ? 'required' : 'nullable',
                'string',
                'regex:/^\+(?:\d{1}|\d{3})(?:\x20?\d){5,14}\d$/'
            ],
            'guardianEmail'=>[
                $age < 18 ? 'required' : 'nullable',
                'email:rfc,dns',
            ],
            'guardianState'=>[
                $age < 18 ? 'required' : 'nullable',
                'string',
            ],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        throw new HttpResponseException(response()->json(['success'=>false, 'message' => $errors], 422));
    }
}
