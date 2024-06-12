<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MotorInsuranceResource extends JsonResource
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
            'companyName' => $this->company_name,
            'insuranceSubType' => $this->insurance_sub_type,
            'policyNumber' => $this->policy_number,
            'expiryDate' => $this->expiry_date,
            'premium' => $this->premium,
            'sumInsured' => $this->sum_insured,
            'insurerName' => $this->insurer_name,
            'vehicleType' => $this->vehicle_type,
            'modeOfPurchase' => $this->mode_of_purchase,
            'brokerName' => $this->broker_name,
            'contactPerson' => $this->contact_person,
            'contactNumber' => $this->contact_number,
            'email' => $this->email,
            'registeredMobile' => $this->registered_mobile,
            'registeredEmail' => $this->registered_email,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'nominee' => $this->nominee,        //relationship
        ];
    }
}
