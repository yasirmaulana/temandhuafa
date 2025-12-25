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
        Schema::table('campaigns', function (Blueprint $table) {
            // Drop the old foreign key that points to 'users'
            $table->dropForeign(['fundraiser_id']);

            // Add the correct foreign key that points to 'fundraisers'
            $table->foreign('fundraiser_id')->references('id')->on('fundraisers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropForeign(['fundraiser_id']);
            $table->foreign('fundraiser_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
