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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->foreignId('category_id')->constrained('categories');
            $table->bigInteger('target_amount');
            $table->bigInteger('collected_amount')->default(0);
            $table->string('image');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['draft', 'published', 'rejected', 'completed']);
            $table->foreignId('fundraiser_id')->constrained('users');
            $table->boolean('is_delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
