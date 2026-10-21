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
        Schema::create('tariffs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('service_id')->nullable();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('currency')->default('KES');
            $table->date('effective_from')->nullable();
            $table->date('effective_until')->nullable();
            $table->unsignedInteger('status_id')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tariffs');
    }
};
