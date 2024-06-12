<?php

namespace App\Models;

use App\Models\Beneficiary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MotorInsurance extends Model
{
    use HasFactory;

    public $table = 'motor_insurances';
    public $primaryKey = 'id';

   public function nominee(){
      return $this->belongsToMany(Beneficiary::class,'motor_insurance_nominee');
   }

}
