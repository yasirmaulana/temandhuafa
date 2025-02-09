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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->string('transaction_id')->nullable();
            $table->decimal('gross_amount', 10, 2)->default(0);
            $table->string('payment_type')->nullable();
            $table->timestamp('transaction_time')->nullable();
            $table->string('transaction_status')->nullable();
            $table->string('fraud_status')->nullable();
            $table->string('pdf_url')->nullable();
            $table->string('campaign_id')->nullable();
            $table->string('fundraiser_id')->nullable();
            $table->boolean('infaq_sistem')->nullable();
            $table->string('donor_name');
            $table->string('email');
            $table->string('phone');
            $table->boolean('anonim');
            $table->text('pray')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
