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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->foreignId('campaign_id')->constrained('campaigns');
            $table->foreignId('donor_id')->constrained('users');
            $table->decimal('amount', 15, 2);
            $table->text('pray')->nullable();
            $table->string('snap_token')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', array('pending', 'success', 'expired', 'failed'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
