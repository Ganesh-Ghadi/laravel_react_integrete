<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->unique()->onDelete('cascade');
            $table->string('full_legal_name')->nullable();
            $table->string('gender')->nullable();   
            $table->date('dob')->nullable();
            $table->string('nationality')->nullable();  
            $table->string('country_of_residence')->nullable();
            $table->string('religion')->nullable();        
            $table->string('marital_status')->nullable();  
            $table->string('married_under_special_act')->nullable();
            $table->string('permanent_house_flat_no')->nullable();
            $table->longText('permanent_address_line_1')->nullable();
            $table->longText('permanent_address_line_2')->nullable();
            $table->string('permanent_pincode')->nullable();
            $table->string('permanent_city')->nullable();
            $table->string('permanent_state')->nullable();
            $table->string('permanent_country')->nullable();
            $table->string('current_house_flat_no')->nullable();
            $table->longtext('current_address_line_1')->nullable();
            $table->longtext('current_address_line_2')->nullable();
            $table->string('current_pincode')->nullable();
            $table->string('current_city')->nullable();
            $table->string('current_state')->nullable();
            $table->string('current_country')->nullable();
            $table->string('adhar_number')->nullable();
            $table->string('adhar_name')->nullable();
            $table->string('adhar_file')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('pan_name')->nullable();
            $table->string('pan_file')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('passport_name')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->string('passport_place_of_issue')->nullable();
            $table->string('passport_file')->nullable();
            $table->string('driving_licence_number')->nullable();
            $table->string('driving_licence_name')->nullable();
            $table->date('driving_licence_expiry_date')->nullable();
            $table->string('driving_licence_place_of_issue')->nullable();
            $table->string('driving_licence_file')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
