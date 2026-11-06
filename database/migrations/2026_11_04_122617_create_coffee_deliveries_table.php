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
        Schema::create('coffee_deliveries', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('delivery_number')->nullable();
            $table->uuid('user_id')->nullable();
            $table->uuid('farmer_id')->nullable();
            $table->uuid('plot_id')->nullable();
            $table->uuid('cooperative_society_id')->nullable();
            $table->uuid('collection_centre_id')->nullable();
            $table->uuid('coffee_species_id')->nullable();
            $table->date('harvest_date')->nullable();
            $table->string('harvest_season')->nullable();
            $table->date('delivery_date')->nullable();
            $table->integer('number_of_bags')->nullable();
            $table->decimal('quantity')->nullable();
            $table->decimal('price_per_kg')->nullable();

            $table->uuid('lot_id')->nullable();
            $table->uuid('recorded_by')->nullable();
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
        Schema::dropIfExists('coffee_deliveries');
    }
};
