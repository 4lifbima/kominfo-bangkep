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
        Schema::create('infrastructure_tics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); // Tower, Server, Fiber Optic
            $table->string('location');
            $table->string('status'); // Active, Maintenance, Down
            $table->string('capacity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infrastructure_tics');
    }
};
