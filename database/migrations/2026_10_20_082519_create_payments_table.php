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
        Schema::create('payments', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('invoice_number')->nullable();
            $table->uuid('user_id')->nullable();
            $table->unsignedInteger('service_id')->nullable();
            $table->unsignedInteger('tariff_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('convenience_fee')->nullable();
            $table->string('currency')->default('KES');
            $table->string('payment_method')->nullable();
            $table->integer('pesaflow_ref_no')->nullable();
            $table->string('pesaflow_invoice_number')->nullable();
            $table->string('pesaflow_invoice_link')->nullable();
            $table->integer('status_id')->default(1);

            $table->string('secure_hash')->nullable();
            $table->string('api_client_id')->nullable();
            $table->string('pesaflow_service_id')->nullable();
            $table->string('picture_url')->nullable();
            $table->string('notification_url')->nullable();
            $table->string('callback_url_on_success')->nullable();
            $table->string('format')->default('json');
            $table->string('account_number')->nullable();
            $table->datetime('settled_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
