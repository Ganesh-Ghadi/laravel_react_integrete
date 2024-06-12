<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\LifeInsurance;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\LifeInsuranceResource;

class LifeInsuranceController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $user = Auth::user();
        $lifeInsurance = $user->profile->lifeInsurance()->with('nominee')->get();
       
        return $this->sendResponse(['LifeInsurances'=>LifeInsuranceResource::collection($lifeInsurance)], "Life Insurances retrived successfully");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $user = Auth::user();
        $lifeInsurance = new LifeInsurance();
        $lifeInsurance->profile_id = $user->profile->id;
        $lifeInsurance->company_name = $request->input('companyName');
        $lifeInsurance->insurance_type = $request->input('insuranceType');
        $lifeInsurance->policy_number = $request->input('policyNumber');
        $formatedDate = $request->input('maturityDate');
        $carbonDate = Carbon::parse($formatedDate);
        $iso8601Date = $carbonDate->toIso8601String();
        $lifeInsurance->maturity_date = $iso8601Date;
        $lifeInsurance->premium = $request->input('premium');
        $lifeInsurance->sum_insured = $request->input('sumInsured');
        $lifeInsurance->policy_holder_name = $request->input('policyHolderName');
        $lifeInsurance->relationship = $request->input('relationship');
        $lifeInsurance->previous_policy_number = $request->input('previousPolicyNumber');
        $lifeInsurance->additional_details = $request->input('additionalDetails');
        $lifeInsurance->mode_of_purchase = $request->input('modeOfPurchase');
        $lifeInsurance->broker_name = $request->input('brokerName');
        $lifeInsurance->contact_person = $request->input('contactPerson');
        $lifeInsurance->contact_number = $request->input('contactNumber');
        $lifeInsurance->email = $request->input('email');
        $lifeInsurance->registered_mobile = $request->input('registeredMobile');
        $lifeInsurance->registered_email = $request->input('registeredEmail');
        $lifeInsurance->save();

        if($request->has('nomineeId')){
            $nominee_id = $request->input('nomineeId');
            $lifeInsurance->nominee()->attach($nominee_id);
        }

        return $this->sendResponse(['LifeInsurance'=> new LifeInsuranceResource($lifeInsurance)], 'Life Insurance details stored successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $lifeInsurance = LifeInsurance::find($id);
        if(!$lifeInsurance){
            return $this->sendError('LifeInsurance Not Found',['error'=>'LifeInsurance not found']);
        }
        $user = Auth::user();
        if($user->profile->id !== $lifeInsurance->profile_id){
           return $this->sendError('Unauthorized', ['error'=>'You are not allowed to view this Life Insurance']);
         }
         $lifeInsurance->load('nominee');

        return $this->sendResponse(['LifeInsurance'=>new LifeInsuranceResource($lifeInsurance)], 'Life Insurance retrived successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $lifeInsurance = LifeInsurance::find($id);
        if(!$lifeInsurance){
            return $this->sendError('lifeInsurance Not Found', ['error'=>'Life Insurance not found']);
        }

         $user = Auth::user();
         if($user->profile->id !== $lifeInsurance->profile_id){
            return $this->sendError('Unauthorized', ['error'=>'You are not allowed to update this Life Insurance']);
         }
          $lifeInsurance->company_name = $request->input('companyName');
          $lifeInsurance->insurance_type = $request->input('insuranceType');
          $lifeInsurance->policy_number = $request->input('policyNumber');
          $formatedDate = $request->input('maturityDate');
          $carbonDate = Carbon::parse($formatedDate);
          $iso8601Date = $carbonDate->toIso8601String();
          $lifeInsurance->maturity_date = $iso8601Date;
          $lifeInsurance->premium = $request->input('premium');
          $lifeInsurance->sum_insured = $request->input('sumInsured');
          $lifeInsurance->policy_holder_name = $request->input('policyHolderName');
          $lifeInsurance->relationship = $request->input('relationship');
          $lifeInsurance->previous_policy_number = $request->input('previousPolicyNumber');
          $lifeInsurance->additional_details = $request->input('additionalDetails');
          $lifeInsurance->mode_of_purchase = $request->input('modeOfPurchase');
          $lifeInsurance->broker_name = $request->input('brokerName');
          $lifeInsurance->contact_person = $request->input('contactPerson');
          $lifeInsurance->contact_number = $request->input('contactNumber');
          $lifeInsurance->email = $request->input('email');
          $lifeInsurance->registered_mobile = $request->input('registeredMobile');
          $lifeInsurance->registered_email = $request->input('registeredEmail');
          $lifeInsurance->save();

          if($request->has('nomineeId')){
            $nominee_id = $request->input('nomineeId');
            $lifeInsurance->nominee()->attach($nominee_id);
          }
  
          return $this->sendResponse(['LifeInsurance'=> new LifeInsuranceResource($lifeInsurance)], 'Life Insurance details Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $lifeInsurance = LifeInsurance::find($id);
        if(!$lifeInsurance){
            return $this->sendError('Life Insurance not found', ['error'=>'Life Insurance not found']);
        }
        $user = Auth::user();
        if($user->profile->id !== $lifeInsurance->profile_id){
            return $this->sendError('Unauthorized', ['error'=>'You are not allowed to access this Life Insurance']);
        }
        $lifeInsurance->delete();

        return $this->sendResponse([], 'Life Insurance deleted successfully');
    }
}
