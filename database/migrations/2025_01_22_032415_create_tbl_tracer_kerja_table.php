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
        Schema::create('tbl_tracer_kerja', function (Blueprint $table) {
            $table->id('id_tracer_kerja');
            $table->unsignedBigInteger('id_alumni');
            $table->string('tracer_kerja_pekerjaan', 50);
            $table->string('tracer_kerja_nama', 50);
            $table->string('tracer_kerja_jabatan', 50);
            $table->string('tracer_kerja_status', 50)->nullable();
            $table->string('tracer_kerja_lokasi', 50);
            $table->string('tracer_kerja_alamat', 50)->nullable();
            $table->date('tracer_kerja_tgl_mulai')->nullable();
            $table->string('tracer_kerja_gaji', 50)->nullable();
            $table->timestamps();
        
            // Foreign Key
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tracer_kerja');
    }
};
