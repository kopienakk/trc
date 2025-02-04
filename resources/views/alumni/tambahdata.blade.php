@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Data Alumni</h1>
    <form action="{{ route('alumni.store') }}" method="POST">
    @csrf
    <!-- Informasi Alumni -->
    <h3>Informasi Alumni</h3>
    <div>
        <label for="id_tahun_lulus">Tahun Lulus:</label>
        <input type="number" id="id_tahun_lulus" name="id_tahun_lulus" required>
    </div>
    <div>
        <label for="id_konsentrasi_keahlian">Konsentrasi Keahlian:</label>
        <input type="number" id="id_konsentrasi_keahlian" name="id_konsentrasi_keahlian" required>
    </div>
    <div>
        <label for="id_status_alumni">Status Alumni:</label>
        <input type="number" id="id_status_alumni" name="id_status_alumni" required>
    </div>
    <div>
        <label for="nisn">NISN:</label>
        <input type="text" id="nisn" name="nisn" required>
    </div>
    <div>
        <label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik" required>
    </div>
    <div>
        <label for="nama_depan">Nama Depan:</label>
        <input type="text" id="nama_depan" name="nama_depan" required>
    </div>
    <div>
        <label for="nama_belakang">Nama Belakang:</label>
        <input type="text" id="nama_belakang" name="nama_belakang">
    </div>
    <div>
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <div>
        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" required>
    </div>
    <div>
        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" required>
    </div>
    <div>
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required>
    </div>
    <div>
        <label for="no_hp">No HP:</label>
        <input type="text" id="no_hp" name="no_hp" required>
    </div>
    <div>
        <label for="akun_fb">Akun Facebook:</label>
        <input type="text" id="akun_fb" name="akun_fb">
    </div>
    <div>
        <label for="akun_ig">Akun Instagram:</label>
        <input type="text" id="akun_ig" name="akun_ig">
    </div>
    <div>
        <label for="akun_tiktok">Akun TikTok:</label>
        <input type="text" id="akun_tiktok" name="akun_tiktok">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label for="status_login">Status Login:</label>
        <select id="status_login" name="status_login">
            <option value="0">Tidak Aktif</option>
            <option value="1">Aktif</option>
        </select>
    </div>


    <button type="submit">Submit</button>
</form>

</div>
@endsection
