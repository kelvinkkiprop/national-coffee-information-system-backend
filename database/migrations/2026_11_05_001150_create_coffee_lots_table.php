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
        Schema::create('coffee_lots', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('cooperative_society_id')->nullable();
            $table->integer('stage_id')->nullable();
            $table->string('lot_number')->nullable();
            $table->uuid('transaction_id')->nullable();
            $table->uuid('parent_lot_id')->nullable();
            $table->string('grade')->nullable();
            $table->decimal('quantity')->nullable();
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
        Schema::dropIfExists('coffee_lots');
    }
};
