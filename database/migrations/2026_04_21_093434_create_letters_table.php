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
    Schema::create('letters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('reference_number'); // Nomor Surat
            $table->string('sender');           // Asal Surat
            $table->date('letter_date');        // Tanggal Surat
            $table->date('received_date');      // Tanggal Terima
            $table->text('subject');            // Perihal
            $table->string('file_path')->nullable(); // Lokasi scan surat (PDF/Gambar)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};
