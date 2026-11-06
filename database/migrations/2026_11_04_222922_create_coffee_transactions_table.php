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
            $table->uuid('buyer_id')->nullable();
            $table->string('buyer_name')->nullable();
            $table->string('traceability_mark')->nullable();
            $table->string('transaction_number')->unique();
            $table->unsignedBigInteger('stage_id')->default(1);
            $table->string('grade')->nullable();
            $table->decimal('quantity')->nullable();

            $table->string('source')->nullable();
            $table->string('destination')->nullable();
            $table->string('shipment_ref')->nullable();
            $table->dateTime('shipped_at')->nullable();
             $table->dateTime('processed_at')->nullable();
            $table->text('remarks')->nullable();

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
