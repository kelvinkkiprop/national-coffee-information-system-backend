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
        Schema::create('licenses', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->string('application_number')->unique();
            $table->unsignedBigInteger('issuing_body_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->string('financial_year')->nullable();
            $table->date('expiry_date')->nullable();

            // CBK
            // 1.AgentLicense
            $table->string('paid_share_capital')->nullable();
            $table->string('directors_details')->nullable();
            $table->string('years_of_technical_experience')->nullable();
            $table->string('growers_represented_and_signed_agreements')->nullable();
            $table->string('indemnity_against_professional_misconduct')->nullable();
            $table->string('liquorer_cupping_facility_engaged')->nullable();
            // 2.BuyerLicense
            $table->string('license_purpose')->nullable();
            // 3.WarehouseOperatorLicense
            $table->string('directors_name_address_and_occupations')->nullable();
            // 4.LiquoringLicense
            $table->string('year_of_certification')->nullable();
            $table->string('current_occupation')->nullable();
            $table->string('coffee_tasting_expert_certificate')->nullable();
            // 5.CommercialMillersLicence
            $table->string('milling_capacity')->nullable();
            $table->string('comprehensive_insurance_policy')->nullable();
            $table->string('mill_certification')->nullable();
            // 6.IndependentCuppingLabsLicence
            $table->string('company_officials')->nullable();
            $table->string('licensed_liquorers_engaged')->nullable();
            $table->string('laboratory_facilities')->nullable();
            $table->string('services_to_be_offered')->nullable();
            $table->string('statutory_compliance')->nullable();

            // COUNTY
            $table->unsignedBigInteger('county_id')->nullable();

            $table->string('self_declaration_form')->nullable();
            $table->boolean('commitment_declaration')->default(true);
            $table->date('date_of_gazettement_intent')->nullable();
            $table->date('date_of_issue')->nullable();
            $table->date('effective_date')->nullable();
            $table->uuid('payment_id')->nullable();
            $table->unsignedBigInteger('payment_status_id')->default(1);
            $table->unsignedBigInteger('status_id')->default(3);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
