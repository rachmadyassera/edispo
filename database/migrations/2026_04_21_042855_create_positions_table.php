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
        Schema::create('positions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('unit_id');
            $table->string('name'); // Nama Jabatan: Lurah, Sekda, dll
            $table->uuid('parent_id')->nullable(); // Atasan langsung untuk alur disposisi
            $table->timestamps();

            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('parent_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
