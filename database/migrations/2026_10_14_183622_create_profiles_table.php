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
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('user_id')->unique();
            // Basic
            $table->unsignedBigInteger('role_id')->nullable();
            $table->string('id_number')->nullable();
            $table->string('country_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            // General
            $table->unsignedBigInteger('legal_status_id')->nullable();
            $table->string('company_registration_number')->nullable();
            $table->date('company_establishment_date')->nullable();
            $table->string('kra_pin')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('postal_address')->nullable();
            // Location
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('county_id')->nullable();
            $table->unsignedBigInteger('sub_county_id')->nullable();
            $table->unsignedBigInteger('ward_id')->nullable();
            $table->string('location')->nullable();
            $table->string('sub_location')->nullable();
            $table->string('village')->nullable();
            $table->string('town')->nullable();
            $table->string('street_name')->nullable();
            $table->string('building_name')->nullable();
            $table->string('plot_number')->nullable();

            // COMMON
            $table->string('millers_code')->nullable();
            // DealerRegistration
            $table->longText('brief_company_profile')->nullable();
            $table->string('directors_of_dealership')->nullable();
            $table->string('engaged_persons_professional_skills')->nullable();
            $table->date('date_of_issue')->nullable();
            $table->date('effective_date')->nullable();
            $table->date('expiry_date')->nullable();


            $table->timestamps();
            $table->softDeletes();

            // Cascade
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
