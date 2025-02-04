<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Study</title>
    <link rel="stylesheet" href="css/daftar.css">

<body>
    <!-- Register Section -->
    <div id="register" class="form-container">
        <h2>Daftar</h2>
        <form action="{{ route('alumni.store') }}" method="POST">

            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <!-- Informasi Alumni -->
            <h3>Data Alumni</h3>

            <div>
                <label for="id_tahun_lulus">Tahun Lulus:</label>
                <select id="id_tahun_lulus" name="id_tahun_lulus">
                    @foreach($tahunLulus as $tahun)
                        <option value="{{ $tahun->id_tahun_lulus }}">{{ $tahun->tahun_lulus }}</option>
                    @endforeach
                </select>

            </div>
            <div>
                <label for="id_konsentrasi_keahlian">Konsentrasi Keahlian:</label>
                <select id="id_konsentrasi_keahlian" name="id_konsentrasi_keahlian">
                    @foreach($konsentrasiKeahlian as $konsentrasi)
                        <option value="{{ $konsentrasi->id_konsentrasi_keahlian }}">{{ $konsentrasi->konsentrasi_keahlian }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="id_status_alumni">Status Alumni::</label>
                <select id="id_status_alumni" name="id_status_alumni">
                    @foreach($statusAlumni as $status)
                        <option value="{{ $status->id_status_alumni }}">{{ $status->status }}</option>
                    @endforeach
                </select>
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


            <h3>Tracer Kuliah</h3>
            <label for="tracer_kuliah_kampus">Nama Kampus:</label>
            <input type="text" name="tracer_kuliah_kampus" id="tracer_kuliah_kampus" required>

            <label for="tracer_kuliah_status">Status Kuliah:</label>
            <input type="text" name="tracer_kuliah_status" id="tracer_kuliah_status" required>

            <label for="tracer_kuliah_jenjang">Jenjang Pendidikan:</label>
            <input type="text" name="tracer_kuliah_jenjang" id="tracer_kuliah_jenjang" required>

            <label for="tracer_kuliah_jurusan">Jurusan:</label>
            <input type="text" name="tracer_kuliah_jurusan" id="tracer_kuliah_jurusan" required>

            <label for="tracer_kuliah_linier">Linier dengan Jurusan?</label>
            <select id="tracer_kuliah_linier" name="tracer_kuliah_linier" required>
                <option value="Iya">Iya</option>
                <option value="Tidak">Tidak</option>
            </select>
            <label for="tracer_kuliah_alamat">Alamat Kampus:</label>
            <input type="text" name="tracer_kuliah_alamat" id="tracer_kuliah_alamat" required>


            
            <h3>Tracer Kerja</h3>
            <label for="tracer_kerja_pekerjaan">Pekerjaan:</label>
            <input type="text" name="tracer_kerja_pekerjaan" id="tracer_kerja_pekerjaan" required>

            <label for="tracer_kerja_nama">Nama Perusahaan:</label>
            <input type="text" name="tracer_kerja_nama" id="tracer_kerja_nama" required>

            <label for="tracer_kerja_jabatan">Jabatan:</label>
            <input type="text" name="tracer_kerja_jabatan" id="tracer_kerja_jabatan" required>

            <label for="tracer_kerja_status">Status Pekerjaan:</label>
            <input type="text" name="tracer_kerja_status" id="tracer_kerja_status" required>

            <label for="tracer_kerja_lokasi">Lokasi Pekerjaan:</label>
            <input type="text" name="tracer_kerja_lokasi" id="tracer_kerja_lokasi" required>

            <label for="tracer_kerja_alamat">Alamat Kantor:</label>
            <input type="text" name="tracer_kerja_alamat" id="tracer_kerja_alamat" required>

            <label for="tracer_kerja_tgl_mulai">Tanggal Mulai Bekerja:</label>
            <input type="date" name="tracer_kerja_tgl_mulai" id="tracer_kerja_tgl_mulai" required>

            <label for="tracer_kerja_gaji">Gaji:</label>
            <input type="number" name="tracer_kerja_gaji" id="tracer_kerja_gaji" required>
            <button type="submit">Daftar</button>

        </form>
        <div class="link">
            <a href="/login">Sudah punya akun?</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</body>

</html>