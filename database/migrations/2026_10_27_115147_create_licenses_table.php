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
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->string('coffee_tasting_expert_certificate')->nullable();
            $table->boolean('commitment_declaration')->default(true);
            $table->date('date_of_gazettement_intent')->nullable();
            $table->date('date_of_issue')->nullable();
            $table->date('effective_date')->nullable();
            // $table->unsignedInteger('duration')->nullable();
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
        Schema::dropIfExists('licenses');
    }
};
