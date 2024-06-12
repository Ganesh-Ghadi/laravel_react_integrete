<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Profile;
use App\Models\Beneficiary;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\BeneficiaryResource;
use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\StoreBeneficiaryRequest;
use App\Http\Requests\UpdateBeneficiaryRequest;

class BeneficiaryController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $user = Auth::user();
        //$beneficiary = Beneficiary::where('type','beneficiary')->where('profile_id',$user->profile->id)->get();
        //$charity = Beneficiary::where('type', 'charity')->where('profile_id', $user->profile->id)->get();
        $beneficiary = auth()->user()->profile->beneficiary()->where('type', 'beneficiary')->get();
        $charity = auth()->user()->profile->beneficiary()->where('type', 'charity')->get();

        if (!$beneficiary) {
             $beneficiary =null;
        }

        if (!$charity) {
            $charity = null;
        }
        return $this->sendResponse(['Beneficiaries'=>BeneficiaryResource::collection($beneficiary), 'Charities'=>BeneficiaryResource::collection($charity)], "Beneficiaries retrived successfully");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBeneficiaryRequest $request): JsonResponse
    {   $user = Auth::user();
        $beneficiary = new Beneficiary();
        $beneficiary->profile_id = $user->profile->id;
        $beneficiary->type = $request->input('type');
        $beneficiary->full_legal_name = $request->input('fullLegalName');
        $beneficiary->relationship = $request->input('relationship');
        $beneficiary->gender = $request->input('gender');
        $formatedDate = $request->input('dob');
        $carbonDate = Carbon::parse($formatedDate);
        $iso8601Date = $carbonDate->toIso8601String();
        $beneficiary->dob = $iso8601Date;
        $beneficiary->mobile = $request->input('mobile'); //
        $beneficiary->email = $request->input('email');
        $beneficiary->guardian_full_legal_name = $request->input('guardianName');
        $beneficiary->guardian_mobile_number = $request->input('guardianMobile');
        $beneficiary->guardian_email = $request->input('guardianEmail');
        $beneficiary->guardian_city = $request->input('guardianCity');
        $beneficiary->guardian_state = $request->input('guardianState');
        $beneficiary->document_type = $request->input('document');
        $beneficiary->document_data = $request->input('documentData');;
        $beneficiary->religion = $request->input('religion');
        $beneficiary->nationality = $request->input('nationality');
        $beneficiary->house_flat_no = $request->input('houseNo');
        $beneficiary->address_line_1 = $request->input('addressLine1');
        $beneficiary->address_line_2 = $request->input('addressLine2');
        $beneficiary->pincode = $request->input('pincode');
        $beneficiary->city = $request->input('city');
        $beneficiary->state = $request->input('state');
        $beneficiary->country = $request->input('country');
        $beneficiary->charity_name = $request->input('charityName');
        $beneficiary->charity_address_1 = $request->input('charityAddress1');
        $beneficiary->charity_address_2 = $request->input('charityAddress2');
        $beneficiary->charity_city = $request->input('charityCity');
        $beneficiary->charity_state = $request->input('charityState');
        $beneficiary->charity_phone_number = $request->input('charityNumber');
        $beneficiary->charity_email = $request->input('charityEmail');
        $beneficiary->charity_contact_person = $request->input('charityContactPerson');
        $beneficiary->charity_website = $request->input('charityWebsite');
        $beneficiary->charity_specific_instruction = $request->input('charitySpecificInstruction');
        $beneficiary->save();  //data saved

        return $this->sendResponse(['Beneficiary'=>new BeneficiaryResource($beneficiary)], 'Beneficiary created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $beneficiary = Beneficiary::find($id);

        if(!$beneficiary){
            return $this->sendError('Beneficiary Not Found',['error'=>'beneficiary not found']);
        }
        $user = Auth::user();
        if($user->profile->id !== $beneficiary->profile_id){
           return $this->sendError('Unauthorized', ['error'=>'You are not allowed to view this Beneficiary']);
         }
        return $this->sendResponse(['Beneficiary'=>new BeneficiaryResource($beneficiary)], 'Beneficiary retrived successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBeneficiaryRequest $request, string $id): JsonResponse
    {   
        $beneficiary = Beneficiary::find($id);
        if(!$beneficiary){
            return $this->sendError('Beneficiary Not Found', ['error'=>'Beneficiary not found']);
        }
         $user = Auth::user();
         if($user->profile->id !== $beneficiary->profile_id){
            return $this->sendError('Unauthorized', ['error'=>'You are not allowed to update this Beneficiary']);
          }
        $beneficiary->type = $request->input('type');
        $beneficiary->full_legal_name = $request->input('fullLegalName');
        $beneficiary->relationship = $request->input('relationship');
        $beneficiary->gender = $request->input('gender');
        $formatedDate = $request->input('dob');
        $carbonDate = Carbon::parse($formatedDate);
        $iso8601Date = $carbonDate->toIso8601String();
        $beneficiary->dob = $iso8601Date;
        $beneficiary->mobile = $request->input('mobile'); //
        $beneficiary->email = $request->input('email');
        $beneficiary->guardian_full_legal_name = $request->input('guardianFullLegalName');
        $beneficiary->guardian_mobile_number = $request->input('guardianNumber');
        $beneficiary->guardian_email = $request->input('guardianEmail');
        $beneficiary->guardian_city = $request->input('guardianCity');
        $beneficiary->guardian_state = $request->input('guardianState');
        $beneficiary->document_type = $request->input('document');
        $beneficiary->document_data = $request->input('documentData');
        $beneficiary->religion = $request->input('religion');
        $beneficiary->nationality = $request->input('nationality');
        $beneficiary->house_flat_no = $request->input('houseFlatNo');
        $beneficiary->address_line_1 = $request->input('addressLine1');
        $beneficiary->address_line_2 = $request->input('addressLine2');
        $beneficiary->pincode = $request->input('pincode');
        $beneficiary->city = $request->input('city');
        $beneficiary->state = $request->input('state');
        $beneficiary->country = $request->input('country');
        $beneficiary->charity_name = $request->input('charityName');
        $beneficiary->charity_address_1 = $request->input('charityAddress1');
        $beneficiary->charity_address_2 = $request->input('charityAddress2');
        $beneficiary->charity_city = $request->input('charityCity');
        $beneficiary->charity_state = $request->input('charityState');
        $beneficiary->charity_phone_number = $request->input('charityPhoneNumber');
        $beneficiary->charity_email = $request->input('charityEmail');
        $beneficiary->charity_contact_person = $request->input('charityContactPerson');
        $beneficiary->charity_website = $request->input('charityWebsite');
        $beneficiary->charity_specific_instruction = $request->input('charitySpecificInstruction');
        $beneficiary->save();
 
        return $this->sendResponse(['Beneficiary'=>new BeneficiaryResource($beneficiary)], "Beneficiary updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {          
        $beneficiary = Beneficiary::find($id);
        if (!$beneficiary) {
            return $this->sendError('Beneficiary not found', ['error' => 'Beneficiary not found']);
        }
        $user = Auth::user();
        if($user->profile->id !== $beneficiary->profile_id){
           return $this->sendError('Unauthorized', ['error'=>'You are not allowed to delete this beneficiary']);
         }
        $beneficiary->delete();
        return $this->sendResponse([],'Beneficiary deleted successfully');
    }
}
