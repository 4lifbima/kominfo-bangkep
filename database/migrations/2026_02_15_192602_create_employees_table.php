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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip')->nullable();
            $table->string('position');
            $table->string('type'); // PNS, PPPK, Honorer
            $table->string('status')->default('active');
            $table->string('avatar')->nullable();
            $table->json('education_history')->nullable(); // Riwayat Pendidikan: [{school, year, degree}, ...]
            $table->json('job_history')->nullable(); // Riwayat Jabatan: [{position, institution, year}, ...]
            $table->json('social_media')->nullable(); // Social Media: {facebook, instagram, twitter, linkedin}
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
