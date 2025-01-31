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
        Schema::create('tbl_tracer_kuliah', function (Blueprint $table) {
            $table->id('id_tracer_kuliah');
            $table->unsignedBigInteger('id_alumni');
            $table->string('tracer_kuliah_kampus', 45);
            $table->string('tracer_kuliah_status', 45);
            $table->string('tracer_kuliah_jenjang', 45);
            $table->string('tracer_kuliah_jurusan', 45);
            $table->string('tracer_kuliah_linier', 45)->nullable();
            $table->string('tracer_kuliah_alamat', 45)->nullable();
            $table->timestamps();
        
            // Foreign Key
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tracer_kuliah');
    }
};
