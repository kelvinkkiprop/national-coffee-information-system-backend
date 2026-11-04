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
        Schema::create('coffee_transactions', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('grade')->nullable();
            $table->decimal('quantity')->nullable();
            $table->date('processed_at')->nullable();
            $table->string('buyer_name')->nullable();
            $table->string('shipment_ref')->nullable();
            $table->date('shipped_on')->nullable();
            $table->unsignedBigInteger('stage_id')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee_transactions');
    }
};
