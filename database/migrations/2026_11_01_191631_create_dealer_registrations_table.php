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
        Schema::create('dealer_registrations', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('user_id')->unique();
            $table->string('application_number')->nullable();

            // Common
            $table->string('certificate_of_incorporation_or_registration')->nullable();
            $table->string('directors_details_id_passport_and_kra_pins')->nullable();
            $table->string('tax_compliance_certificate')->nullable();
            // 2_Grower
            $table->uuid('cooperative_society_id')->nullable();
            // 16_Coffee_Training_School
            $table->string('premises_ownership_or_lease_document')->nullable();
            $table->string('training_equipment_inventory')->nullable();
            $table->string('course_outline_and_training_curriculum')->nullable();
            $table->string('names_qualifications_and_certificates_of_trainers')->nullable();
            $table->string('education_or_training_accreditation_certificate')->nullable();
            $table->string('public_health_certificate')->nullable();
            // 17_Event_Organisers
            $table->string('company_profile')->nullable();
            // 18_Coffee_Projects
            $table->string('project_document')->nullable();
            $table->string('county_government_support_letters_and_mou')->nullable();
            $table->string('implementation_plan_monitoring_and_evaluation_framework')->nullable();

            $table->date('date_of_issue')->nullable();
            $table->date('effective_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->integer('status_id')->default(3);

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
        Schema::dropIfExists('dealer_registrations');
    }
};
