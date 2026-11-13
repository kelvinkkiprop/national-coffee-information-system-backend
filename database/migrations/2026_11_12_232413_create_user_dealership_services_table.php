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
        Schema::create('user_dealership_services', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->uuid('dealer_registration_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->date('expiry_date')->nullable();
            $table->integer('status_id')->default(1);
            $table->timestamps();
            // Cascade
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dealer_registration_id')->references('id')->on('dealer_registrations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_dealership_services');
    }
};
