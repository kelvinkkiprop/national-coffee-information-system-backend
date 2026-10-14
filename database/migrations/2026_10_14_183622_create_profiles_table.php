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
            $table->string('id_number')->nullable();
            $table->string('phone_number')->nullable();

            // Location
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('county_id')->nullable();
            $table->unsignedBigInteger('sub_county_id')->nullable();
            $table->unsignedBigInteger('ward_id')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('physical_address')->nullable();

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
