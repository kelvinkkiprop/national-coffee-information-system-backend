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
            $table->uuid('farmer_id')->nullable();
            $table->decimal('size', 10, 2)->nullable(); // Hectares
            $table->string('soil_profile')->nullable();
            $table->integer('tree_count')->nullable();
            $table->integer('coffee_species_id')->nullable();
            $table->uuid('cooperative_society_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('county_id')->nullable();
            $table->integer('data_source_id')->nullable();//GPS_Surveys/RemoteSensing
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->longText('geo_json_geometry')->nullable();
            $table->boolean('greater_than_4ha')->default(true);
            $table->integer('risk_level_id')->default(1);
            $table->integer('object_id')->nullable();
            $table->integer('farm_id')->nullable();
            $table->date('deforestation_checked_at')->nullable();
            $table->string('deforestation_evidence')->nullable();//AssessmentReport/SupportingEvidence

            $table->datetime('digitized_at')->nullable();
            $table->integer('status_id')->default(1);


            // $table->string('area_basis')->nullable();
            // $table->boolean('is_available')->default(false);
            // $table->string('availability_status')->nullable();
            // $table->string('certification_type')->nullable();

            // $table->unsignedBigInteger('cluster_id')->nullable();
            // $table->unsignedInteger('cluster_size')->default(0);

            // $table->string('consent_reason')->nullable();
            // $table->boolean('is_consented')->default(false);
            // $table->boolean('coordinates_validated')->default(false);

            // $table->string('county')->nullable();
            // $table->string('county_from_source')->nullable();
            // $table->string('county_from_gis')->nullable();
            // $table->boolean('county_matches')->default(false);
            // $table->string('county_raw')->nullable();

            // $table->unsignedInteger('tree_density')->nullable();
            // $table->timestamp('digitized_at')->nullable();
            // $table->decimal('distance_to_road_m', 12, 2)->nullable();
            // $table->unsignedInteger('duplicate_group_id')->nullable();

            // $table->string('estate_code')->nullable();
            // $table->string('estate_name')->nullable();
            // $table->string('estate_type')->nullable();

            // $table->string('factory_name')->nullable();
            // $table->string('farm_shape')->nullable();
            // $table->text('flags')->nullable();

            // $table->string('form_version')->nullable();
            // $table->string('grower_code')->nullable();
            // $table->string('grower_name')->nullable();
            // $table->string('grower_type')->nullable();

            // $table->string('harvest_month')->nullable();
            // $table->unsignedInteger('harvest_quantity')->nullable();
            // $table->decimal('implied_area_ha', 12, 4)->nullable();

            // $table->boolean('is_in_target_area')->default(false);
            // $table->unsignedBigInteger('kobo_submission_id')->nullable();
            // $table->string('kobo_submission_status')->nullable();

            // $table->decimal('latitude', 10, 7)->nullable();
            // $table->decimal('longitude', 10, 7)->nullable();

            // $table->unsignedInteger('neighbours_within_50m')->nullable();
            // $table->string('other_membership')->nullable();
            // $table->unsignedInteger('parcel_number')->nullable();
            // $table->string('planting_period')->nullable();
            // $table->unsignedInteger('polygon_gis_area')->nullable();

            // $table->string('processing_method')->nullable();
            // $table->text('quality_assurance_flags')->nullable();

            // $table->string('respondent_age_group')->nullable();
            // $table->string('respondent_category')->nullable();
            // $table->string('respondent_gender')->nullable();

            // $table->string('road_name')->nullable();
            // $table->string('road_type')->nullable();
            // $table->string('society_survey')->nullable();

            // $table->string('data_status')->nullable();
            // $table->string('subcounty')->nullable();
            // $table->timestamp('submitted_at')->nullable();
            // $table->string('submitted_by')->nullable();

            // $table->unsignedInteger('trees_batian')->default(0);
            // $table->unsignedInteger('trees_blue_mountain')->default(0);
            // $table->unsignedInteger('trees_brazil')->default(0);
            // $table->unsignedInteger('trees_k7')->default(0);
            // $table->unsignedInteger('trees_robusta')->default(0);
            // $table->unsignedInteger('trees_ruiru_11')->default(0);
            // $table->unsignedInteger('trees_sl28')->default(0);
            // $table->unsignedInteger('trees_sl34')->default(0);
            // $table->unsignedInteger('total_coffee_trees')->default(0);

            // $table->uuid('uuid')->nullable()->unique();

            // $table->text('validation_results')->nullable();
            // $table->string('coffee_variety')->nullable();
            // $table->string('ward')->nullable();
            // $table->text('validation_warnings')->nullable();






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
