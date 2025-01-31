@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Data Alumni</h1>

    <form action="{{ route('alumni.store') }}" method="POST">
        @csrf
        <!-- Data tbl_alumni -->
        <h2 class="text-xl font-semibold mb-4">Data Alumni</h2>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="nisn">NISN</label>
                <input type="text" name="nisn" id="nisn" class="form-input w-full">
            </div>
            <div>
                <label for="nik">NIK</label>
                <input type="text" name="nik" id="nik" class="form-input w-full">
            </div>
            <div>
                <label for="nama_depan">Nama Depan</label>
                <input type="text" name="nama_depan" id="nama_depan" class="form-input w-full">
            </div>
            <div>
                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" name="nama_belakang" id="nama_belakang" class="form-input w-full">
            </div>
            <div>
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select w-full">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-input w-full">
            </div>
            <div>
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-input w-full">
            </div>
            <div>
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-input w-full">
            </div>
            <div>
                <label for="no_hp">Nomor HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-input w-full">
            </div>
            <div>
                <label for="akun_fb">Akun Facebook</label>
                <input type="text" name="akun_fb" id="akun_fb" class="form-input w-full">
            </div>
            <div>
                <label for="akun_ig">Akun Instagram</label>
                <input type="text" name="akun_ig" id="akun_ig" class="form-input w-full">
            </div>
            <div>
                <label for="akun_tiktok">Akun Tiktok</label>
                <input type="text" name="akun_tiktok" id="akun_tiktok" class="form-input w-full">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-input w-full">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-input w-full">
            </div>
        </div>

        <!-- Data tbl_bidang_keahlian -->
        <h2 class="text-xl font-semibold mt-6 mb-4">Bidang Keahlian</h2>
        <div>
            <label for="kode_bidang_keahlian">Kode Bidang Keahlian</label>
            <input type="text" name="kode_bidang_keahlian" id="kode_bidang_keahlian" class="form-input w-full">
        </div>
        <div>
            <label for="bidang_keahlian">Bidang Keahlian</label>
            <input type="text" name="bidang_keahlian" id="bidang_keahlian" class="form-input w-full">
        </div>

        <!-- Data tbl_program_keahlian -->
        <h2 class="text-xl font-semibold mt-6 mb-4">Program Keahlian</h2>
        <div>
            <label for="kode_program_keahlian">Kode Program Keahlian</label>
            <input type="text" name="kode_program_keahlian" id="kode_program_keahlian" class="form-input w-full">
        </div>
        <div>
            <label for="program_keahlian">Program Keahlian</label>
            <input type="text" name="program_keahlian" id="program_keahlian" class="form-input w-full">
        </div>

        <!-- Data tbl_konsentrasi_keahlian -->
        <h2 class="text-xl font-semibold mt-6 mb-4">Konsentrasi Keahlian</h2>
        <div>
            <label for="kode_konsentrasi_keahlian">Kode Konsentrasi Keahlian</label>
            <input type="text" name="kode_konsentrasi_keahlian" id="kode_konsentrasi_keahlian" class="form-input w-full">
        </div>
        <div>
            <label for="konsentrasi_keahlian">Konsentrasi Keahlian</label>
            <input type="text" name="konsentrasi_keahlian" id="konsentrasi_keahlian" class="form-input w-full">
        </div>

        <!-- Data tbl_tracer_kuliah -->
        <h2 class="text-xl font-semibold mt-6 mb-4">Tracer Kuliah</h2>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="tracer_kuliah_kampus">Kampus</label>
                <input type="text" name="tracer_kuliah_kampus" id="tracer_kuliah_kampus" class="form-input w-full">
            </div>
            <div>
                <label for="tracer_kuliah_status">Status</label>
                <input type="text" name="tracer_kuliah_status" id="tracer_kuliah_status" class="form-input w-full">
            </div>
            <div>
                <label for="tracer_kuliah_jenjang">Jenjang</label>
                <input type="text" name="tracer_kuliah_jenjang" id="tracer_kuliah_jenjang" class="form-input w-full">
            </div>
            <div>
                <label for="tracer_kuliah_jurusan">Jurusan</label>
                <input type="text" name="tracer_kuliah_jurusan" id="tracer_kuliah_jurusan" class="form-input w-full">
            </div>
            <div>
                <label for="tracer_kuliah_linier">Linier</label>
                <input type="text" name="tracer_kuliah_linier" id="tracer_kuliah_linier" class="form-input w-full">
            </div>
            <div>
                <label for="tracer_kuliah_alamat">Alamat</label>
                <input type="text" name="tracer_kuliah_alamat" id="tracer_kuliah_alamat" class="form-input w-full">
            </div>
        </div>

        <!-- Data tbl_tracer_kerja -->
        <h2 class="text-xl font-semibold mt-6 mb-4">Tracer Kerja</h2>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="tracer_kerja_pekerjaan">Pekerjaan</label>
                <input type="text" name="tracer_kerja_pekerjaan" id="tracer_kerja_pekerjaan" class="form-input w-full">
            </div>
            <div>
                <label for="tracer_kerja_nama">Nama Perusahaan</label>
                <input type="text" name="tracer_kerja_nama" id="tracer_kerja_nama" class="form-input w-full">
            </div>
            <div>
                <label for="tracer_kerja_jabatan">Jabatan</label>
                <input type="text" name="tracer_kerja_jabatan" id="tracer_kerja_jabatan" class="form-input w-full">
            </div>
            <div>
                <label for="tracer_kerja_status">Status</label>
                <input type="text" name="tracer_kerja_status" id="tracer_kerja_status" class="form-input w-full">
            </div>
            <div>
                <label for="tracer_kerja_lokasi">Lokasi</label>
                <input type="text" name="tracer_kerja_lokasi" id="tracer_kerja_lokasi" class="form-input w-full">
            </div>
            <div>
                <label for="tracer_kerja_alamat">Alamat</label>
                <input type="text" name="tracer_kerja_alamat" id="tracer_kerja_alamat" class="form-input w-full">
            </div>
            <div>
                <label for="tracer_kerja_tgl_mulai">Tanggal Mulai</label>
                <input type="date" name="tracer_kerja_tgl_mulai" id="tracer_kerja_tgl_mulai" class="form-input w-full">
            </div>
            <div>
                <label for="tracer_kerja_gaji">Gaji</label>
                <input type="text" name="tracer_kerja_gaji" id="tracer_kerja_gaji" class="form-input w-full">
            </div>
        </div>

        <!-- Submit -->
        <div class="mt-6">
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
