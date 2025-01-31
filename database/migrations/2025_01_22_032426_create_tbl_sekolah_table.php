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
        Schema::create('tbl_sekolah', function (Blueprint $table) {
            $table->id('id_sekolah');
            $table->string('npsn', 10)->unique();
            $table->string('nss', 20)->nullable();
            $table->string('nama_sekolah', 50);
            $table->string('alamat', 100);
            $table->string('no_telp', 15)->nullable();
            $table->string('website', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sekolah');
    }
};
