<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MotorInsurance;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\MotorInsuranceResource;

class MotorInsuranceController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $user = Auth::user();
        $motorInsurance = $user->profile->motorInsurance()->with('nominee')->get();
        if(!$motorInsurance){
            return $this->sendError('Motor Insurance not added',['error'=>'motor insurances not added yet']);
        }
        return $this->sendResponse(['MotorInsurances'=>MotorInsuranceResource::collection($motorInsurance)], "Motor Insurances retrived successfully");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $user = Auth::user();
        $motorInsurance = new MotorInsurance();
        $motorInsurance->profile_id = $user->profile->id;
        $motorInsurance->company_name = $request->input('companyName');
        $motorInsurance->insurance_sub_type = $request->input('insuranceSubType');
        $motorInsurance->policy_number = $request->input('policyNumber');
        $formatedDate = $request->input('expiryDate');
        $carbonDate = Carbon::parse($formatedDate);
        $iso8601Date = $carbonDate->toIso8601String();
        $motorInsurance->expiry_date = $iso8601Date;
        $motorInsurance->premium = $request->input('premium');
        $motorInsurance->sum_insured = $request->input('sumInsured');
        $motorInsurance->insurer_name = $request->input('insurerName');
        $motorInsurance->vehicle_type = $request->input('vehicleType');
        $motorInsurance->mode_of_purchase = $request->input('modeOfPurchase');
        $motorInsurance->broker_name = $request->input('brokerName');
        $motorInsurance->contact_person = $request->input('contactPerson');
        $motorInsurance->contact_number = $request->input('contactNumber');
        $motorInsurance->email = $request->input('email');
        $motorInsurance->registered_mobile = $request->input('registeredMobile');
        $motorInsurance->registered_email = $request->input('registeredEmail');
        $motorInsurance->save();

        if($request->has('nomineeId')){
            $nominee_id = $request->input('nomineeId');
            $motorInsurance->nominee()->attach($nominee_id);
        }
        
        return $this->sendResponse(['MotorInsurance'=>new MotorInsuranceResource($motorInsurance)], 'Motor Insurance Data Stored successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $motorInsurance = MotorInsurance::find($id);
        if(!$motorInsurance){
            return $this->sendError('motorInsurance Not Found',['error'=>'motorInsurance not found']);
        }
        $user = Auth::user();
        if($user->profile->id !== $motorInsurance->profile_id){
           return $this->sendError('Unauthorized', ['error'=>'You are not allowed to view this Motor Insurance']);
         }
         $motorInsurance->load('nominee');

        return $this->sendResponse(['MotorInsurance'=>new MotorInsuranceResource($motorInsurance)], 'Motor Insurance retrived successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $motorInsurance = MotorInsurance::find($id);
        if(!$motorInsurance){
            return $this->sendError('motorInsurance Not Found', ['error'=>'Motor Insurance not found']);
        }

         $user = Auth::user();
         if($user->profile->id !== $motorInsurance->profile_id){
            return $this->sendError('Unauthorized', ['error'=>'You are not allowed to update this Motor Insurance']);
         }

         $motorInsurance->company_name = $request->input('companyName');
         $motorInsurance->insurance_sub_type = $request->input('insuranceSubType');
         $motorInsurance->policy_number = $request->input('policyNumber');
         $formatedDate = $request->input('expiryDate');
         $carbonDate = Carbon::parse($formatedDate);
         $iso8601Date = $carbonDate->toIso8601String();
         $motorInsurance->expiry_date = $iso8601Date;
         $motorInsurance->premium = $request->input('premium');
         $motorInsurance->sum_insured = $request->input('sumInsured');
         $motorInsurance->insurer_name = $request->input('insurerName');
         $motorInsurance->vehicle_type = $request->input('vehicleType');
         $motorInsurance->mode_of_purchase = $request->input('modeOfPurchase');
         $motorInsurance->broker_name = $request->input('brokerName');
         $motorInsurance->contact_person = $request->input('contactPerson');
         $motorInsurance->contact_number = $request->input('contactNumber');
         $motorInsurance->email = $request->input('email');
         $motorInsurance->registered_mobile = $request->input('registeredMobile');
         $motorInsurance->registered_email = $request->input('registeredEmail');
         $motorInsurance->save();
 
         if($request->has('nomineeId')){
             $nominee_id = $request->input('nomineeId');
             $motorInsurance->nominee()->attach($nominee_id);
         }
         
         return $this->sendResponse(['MotorInsurance'=>new MotorInsuranceResource($motorInsurance)], 'Motor Insurance Data Stored successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $motorInsurance = MotorInsurance::find($id);
        if(!$motorInsurance){
            return $this->sendError('Motor Insurance not found', ['error'=>'Motor Insurance not found']);
        }
        $user = Auth::user();
        if($user->profile->id !== $motorInsurance->profile_id){
            return $this->sendError('Unauthorized', ['error'=>'You are not allowed to access this Motor Insurance']);
        }
        $motorInsurance->delete();

        return $this->sendResponse([], 'Motor Insurance deleted successfully');
    }
}
