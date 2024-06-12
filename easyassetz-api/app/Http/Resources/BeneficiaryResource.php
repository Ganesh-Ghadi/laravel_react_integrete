<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BeneficiaryResource extends JsonResource
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
            'profileId' => $this->profile_id,
            'type'=>$this->type,
            'fullLegalName' => $this->full_legal_name,
            'relationship' => $this->relationship,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'mobile'=>$this->mobile,
            'email'=>$this->email,
            'guardianName' => $this->guardian_full_legal_name,
            'guardianMobile' => $this->guardian_mobile_number,
            'guardianEmail' => $this->guardian_email,
            'guardianCity' => $this->guardian_city,
            'guardianState' => $this->guardian_state,
            'document'=> $this->document_type,
            'ducumentData'=> $this->document_data,
            'religion' => $this->religion,
            'nationality' => $this->nationality,
            'houseNo' => $this->house_flat_no,
            'addressLine1' => $this->address_line_1,
            'addressLine2' => $this->address_line_2,
            'pincode' => $this->pincode,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'charityName' => $this->charity_name,
            'charityAddress1' => $this->charity_address_1,
            'charityAddress2' => $this->charity_address_2,
            'charityCity' => $this->charity_city,
            'charityState' => $this->charity_state,
            'charityNumber' => $this->charity_phone_number,
            'charityEmail' => $this->charity_email,
            'charityContactPerson' => $this->charity_contact_person,
            'charityWebsite' => $this->charity_website,
            'charitySpecificInstruction' => $this->charity_specific_instruction,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
