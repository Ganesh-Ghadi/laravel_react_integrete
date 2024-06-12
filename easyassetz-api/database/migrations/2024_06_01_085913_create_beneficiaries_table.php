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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->onDelete('cascade');
            $table->enum('type',['beneficiary','charity']);
            $table->string('full_legal_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('guardian_full_legal_name')->nullable();
            $table->string('guardian_mobile_number')->nullable();
            $table->string('guardian_email')->nullable();
            $table->string('guardian_city')->nullable();
            $table->string('guardian_state')->nullable();
            $table->string('document_type')->nullable();
            $table->string('document_data')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('house_flat_no')->nullable();
            $table->longText('address_line_1')->nullable();
            $table->longText('address_line_2')->nullable();
            $table->string('pincode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('charity_name')->nullable();
            $table->longText('charity_address_1')->nullable();
            $table->longText('charity_address_2')->nullable();
            $table->string('charity_city')->nullable();
            $table->string('charity_state')->nullable();
            $table->string('charity_phone_number')->nullable();
            $table->string('charity_email')->nullable();
            $table->string('charity_contact_person')->nullable();
            $table->string('charity_website')->nullable();
            $table->longText('charity_specific_instruction')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
