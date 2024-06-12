<?php

namespace App\Models;

use App\Models\Beneficiary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LifeInsurance extends Model
{
    use HasFactory;

    public $table = 'life_insurances';
    public $primaryKey = 'id';


   public function nominee(){
      return $this->belongsToMany(Beneficiary::class,'life_insurance_nominee');
   }


}
