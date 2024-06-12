<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'fullLegalName' => $this->full_legal_name,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'nationality' => $this->nationality,
            'countryOfResidence' => $this->country_of_residence,
            'religion' => $this->religion,
            'maritalStatus' => $this->marital_status,
            'marriedUnderSpecialAct' => $this->married_under_special_act,
            'permanentHouseFlatNo' => $this->permanent_house_flat_no,
            'permanentAddressLine1' => $this->permanent_address_line_1,
            'permanentAddressLine2' => $this->permanent_address_line_2,
            'permanentPincode' => $this->permanent_pincode,
            'permanentCity' => $this->permanent_city,
            'permanentState' => $this->permanent_state,
            'permanentCountry' => $this->permanent_country,
            'currentHouseFlatNo' => $this->current_house_flat_no,
            'currentAddressLine1' => $this->current_address_line_1,
            'currentAddressLine2' => $this->current_address_line_2,
            'currentPincode' => $this->current_pincode,
            'currentCity' => $this->current_city,
            'currentState' => $this->current_state,
            'currentCountry' => $this->current_country,
            'adharNumber' => $this->adhar_number,
            'adharName' => $this->adhar_name,
            'adharFile' => $this->adhar_file,
            'panNumber' => $this->pan_number,
            'panName' => $this->pan_name,
            'panFile' => $this->pan_file,
            'passportNumber' => $this->passport_number,
            'passportName' => $this->passport_name,
            'passportExpiryDate' => $this->passport_expiry_date,
            'passportPlaceOfIssue' => $this->passport_place_of_issue,
            'passportFile' => $this->passport_file,
            'drivingLicenceNumber' => $this->driving_licence_number,
            'drivingLicenceName' => $this->driving_licence_name,
            'drivingLicenceExpiryDate' => $this->driving_licence_expiry_date,
            'drivingLicencePlaceOfIssue' => $this->driving_licence_place_of_issue,
            'drivingLicenceFile' => $this->driving_licence_file,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
