<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LifeInsuranceResource extends JsonResource
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
            'insuranceType' => $this->insurance_type,
            'policyNumber' => $this->policy_number,
            'maturityDate' => $this->maturity_date,
            'premium' => $this->premium,
            'sumInsured' => $this->sum_insured,
            'policyHolderName' => $this->policy_holder_name,
            'relationship' => $this->relationship,
            'previousPolicyNumber' => $this->previous_policy_number,
            'additionalDetails' => $this->additional_details,
            'modeOfPurchase' => $this->mode_of_purchase,
            'brokerName' => $this->broker_name,
            'contactPerson' => $this->contact_person,
            'contactNumber' => $this->contact_number,
            'email' => $this->email,
            'registeredMobile' => $this->registered_mobile,
            'registeredEmail' => $this->registered_email,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'nominee' => $this->nominee,            //relationship nominee->pluck('id') to get only id
        ];
    }
}
