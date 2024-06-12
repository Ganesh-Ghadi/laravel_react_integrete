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
        Schema::create('life_insurances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->onDelete('cascade');
            $table->string('company_name')->nullable();
            $table->string('insurance_type')->nullable();
            $table->string('policy_number')->nullable();
            $table->date('maturity_date')->nullable();
            $table->bigInteger('premium')->nullable();
            $table->bigInteger('sum_insured')->nullable();
            $table->string('policy_holder_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('previous_policy_number')->nullable();
            $table->string('additional_details')->nullable();
            $table->enum('mode_of_purchase',['broker','e-insurance']);
            $table->string('broker_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('registered_mobile')->nullable();
            $table->string('registered_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('life_insurances');
    }
};
