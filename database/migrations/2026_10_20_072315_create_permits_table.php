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
        Schema::create('permits', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->string('application_number')->unique();

            $table->unsignedBigInteger('type_id')->nullable();
            $table->string('mark')->nullable();
            $table->unsignedBigInteger('coffee_species_id')->nullable();
            $table->unsignedBigInteger('coffee_form_id')->nullable();
            $table->unsignedInteger('number_of_bags')->nullable();
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->unsignedInteger('distance')->nullable();
            $table->string('vehicle_registration_number')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('driver_id_number')->nullable();
            $table->string('warehouse_receipt_number')->nullable();

            $table->date('date_of_issue')->nullable();
            $table->date('effective_date')->nullable();
            $table->unsignedInteger('duration')->nullable();
            $table->date('expiry_date')->nullable();
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
        Schema::dropIfExists('permits');
    }
};
