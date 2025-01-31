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
        Schema::create('tbl_konsentrasi_keahlian', function (Blueprint $table) {
            $table->id('id_konsentrasi_keahlian');
            $table->unsignedBigInteger('id_program_keahlian');
            $table->string('kode_konsentrasi_keahlian', 10);
            $table->string('konsentrasi_keahlian', 100);
            $table->timestamps();
        
            // Foreign Key
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_konsentrasi_keahlian');
    }
};
