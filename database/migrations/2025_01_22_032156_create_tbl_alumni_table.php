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
        Schema::create('tbl_alumni', function (Blueprint $table) {
            $table->id('id_alumni');
            $table->unsignedBigInteger('id_tahun_lulus');
            $table->unsignedBigInteger('id_konsentrasi_keahlian');
            $table->unsignedBigInteger('id_status_alumni');
            $table->string('nisn', 20)->unique();
            $table->string('nik', 20)->unique();
            $table->string('nama_depan', 50);
            $table->string('nama_belakang', 50)->nullable();
            $table->string('jenis_kelamin', 10);
            $table->string('tempat_lahir', 50);
            $table->date('tgl_lahir');
            $table->string('alamat', 100);
            $table->string('no_hp', 15);
            $table->string('akun_fb', 50)->nullable();
            $table->string('akun_ig', 50)->nullable();
            $table->string('akun_tiktok', 50)->nullable();
            $table->string('email', 50)->unique();
            $table->text('password');
            $table->enum('status_login', ['0', '1'])->default('0');
            $table->timestamps();

  
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_alumni');
    }
};
