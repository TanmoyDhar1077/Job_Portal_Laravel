<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();

            // Job Basic Info
            $table->string('job_title');
            $table->text('job_description')->nullable();
            $table->string('salary_range');
            $table->string('location');

            // Job Category & Type
            $table->enum('job_type', ['full-time', 'part-time', 'internship', 'contract'])->default('full-time');
            $table->enum('job_level', ['entry', 'mid', 'senior'])->nullable();

            // Optional Details
            $table->integer('experience_required')->nullable(); // in years
            $table->string('education_level')->nullable(); // e.g. Bachelor, Master
            $table->date('application_deadline')->nullable();

            // Status & Meta
            $table->boolean('is_active')->default(true);
            $table->integer('views')->default(0);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
