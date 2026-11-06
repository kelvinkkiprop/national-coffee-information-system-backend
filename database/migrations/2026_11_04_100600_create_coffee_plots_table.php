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
        Schema::create('coffee_plots', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('owner_id')->nullable();
            $table->decimal('size', 10, 2)->nullable(); // Hectares
            $table->string('soil_profile')->nullable();
            $table->unsignedBigInteger('number_of_coffee_trees')->nullable();
            $table->unsignedBigInteger('coffee_species_id')->nullable();
            $table->uuid('cooperative_society_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('county_id')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->longText('geo_json_geometry')->nullable();
            $table->boolean('greater_than_4ha')->default(true);
            $table->integer('deforestation_status_id')->default(2); //Pending, Compliant, Non-compliant, Under Review
            $table->date('deforestation_checked_at')->nullable();
            $table->date('deforestation_evidence')->nullable();//AssessmentReport/SupportingEvidence
            $table->integer('status_id')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee_plots');
    }
};
