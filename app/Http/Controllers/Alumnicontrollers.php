<?php

namespace App\Http\Controllers;

use App\Models\StatusAlumni;
use App\Models\TahunLulus;
use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\BidangKeahlian;
use App\Models\ProgramKeahlian;
use App\Models\KonsentrasiKeahlian;
use App\Models\TracerKuliah;
use App\Models\TracerKerja;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Alumnicontrollers extends Controller
{
    // Menampilkan Form untuk Menambah atau Mengedit Data Alumni
    public function form()
    {
        $alumni = Alumni::where('email', auth()->user()->email)->first();
        return view('alumni.form', compact('alumni'));
    }

    // Menyimpan atau Memperbarui Data Alumni
    public function save(Request $request)
    {
        $validated = $request->validate([
            'id_tahun_lulus' => 'required|exists:tbl_tahun_lulus,id_tahun_lulus',
            'id_konsentrasi_keahlian' => 'required|exists:tbl_konsentrasi_keahlian,id_konsentrasi_keahlian',
            'id_status_alumni' => 'required|exists:tbl_status_alumni,id_status_alumni',
            'nisn' => 'required|numeric|unique:tbl_alumni,nisn',
            'nik' => 'required|numeric',
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'nullable|string|max:500',
            'no_hp' => 'required|string|max:15',
        ]);

        Alumni::updateOrCreate(
            ['email' => auth()->user()->email],
            array_merge($validated, ['email' => auth()->user()->email])
        );

        return redirect()->route('alumni.dashboard')->with('success', 'Data berhasil disimpan.');
    }

    // Menampilkan Dashboard Alumni
    public function dashboard()
    {
        // $alumni = Alumni::where('email', auth()->user()->email)->first();

        $alumni = Alumni::all();
        return view('alumni.dashboard', compact('alumni'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumni = Alumni::all();
        return view('admin.alumni.index', compact('alumni'));


    } //$alumni = Alumni::with(['program', 'status', 'tahun'])->get();

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua data tahun lulus dari tabel
        $bidangKeahlian = BidangKeahlian::all();
        $programKeahlian = ProgramKeahlian::all();
        $tahunLulus = TahunLulus::all();
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        $statusAlumni = StatusAlumni::all();


        // Mengirim data ke view registrasi
        return view('auth.register', compact('tahunLulus', "bidangKeahlian", "programKeahlian", "konsentrasiKeahlian", "statusAlumni"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_tahun_lulus' => 'required|exists:tbl_tahun_lulus,id_tahun_lulus',
            'id_konsentrasi_keahlian' => 'required|exists:tbl_konsentrasi_keahlian,id_konsentrasi_keahlian',
            'id_status_alumni' => 'required|exists:tbl_status_alumni,id_status_alumni',
            'nisn' => 'required|integer|max:20|unique:tbl_alumni',
            'nik' => 'required|integer|max:20|unique:tbl_alumni',
            'nama_depan' => 'required|string|max:50',
            'nama_belakang' => 'nullable|string|max:50',
            'jenis_kelamin' => 'required|string|max:10',
            'tempat_lahir' => 'required|string|max:50',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:100',
            'no_hp' => 'required|string|max:15',
            'akun_fb' => 'nullable|string|max:50',
            'akun_ig' => 'nullable|string|max:50',
            'akun_tiktok' => 'nullable|string|max:50',
            'email' => 'required|string|email|max:50|unique:tbl_alumni',
            'password' => 'required|string|min:8',
            'status_login' => 'nullable|in:0,1',
            //
            'tracer_kuliah_kampus' => 'required|string|max:50',
            'tracer_kuliah_status' => 'required|string|max:50',
            'tracer_kuliah_jenjang' => 'required|string|max:50',
            'tracer_kuliah_jurusan' => 'required|string|max:50',
            'tracer_kuliah_linier' => 'required|in:Tidak,Iya',
            'tracer_kuliah_alamat' => 'required|string|max:100',
            //
            'tracer_kerja_pekerjaan' => 'required|string|max:50',
            'tracer_kerja_nama' => 'required|string|max:50',
            'tracer_kerja_jabatan' => 'required|string|max:50',
            'tracer_kerja_status' => 'required|string|max:50',
            'tracer_kerja_lokasi' => 'required|string|max:100',
            'tracer_kerja_alamat' => 'required|string|max:100',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'required|integer|max:20',

        ]);
        // dd( $request->tahun_lulus());    

        // Simpan data
        $alumni = Alumni::create(
            [
                'id_tahun_lulus' => $request['id_tahun_lulus'],
                'id_konsentrasi_keahlian' => $request['id_konsentrasi_keahlian'],
                'id_status_alumni' => $request['id_status_alumni'],
                'nisn' => $request['nisn'],
                'nik' => $request['nik'],
                'nama_depan' => $request['nama_depan'],
                'nama_belakang' => $request['nama_belakang'],
                'jenis_kelamin' => $request['jenis_kelamin'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tgl_lahir' => $request['tgl_lahir'],
                'alamat' => $request['alamat'],
                'no_hp' => $request['no_hp'],
                'akun_fb' => $request['akun_fb'],
                'akun_ig' => $request['akun_ig'],
                'akun_tiktok' => $request['akun_tiktok'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]
        );

        User::create([
            'name' => $request->nama_depan . ' ' . $request->nama_belakang,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => 'alumni'
        ]);

        TracerKuliah::create([

            'id_alumni' => $alumni->id_alumni,
            'tracer_kuliah_kampus' => $request['tracer_kuliah_kampus'],
            'tracer_kuliah_status' => $request['tracer_kuliah_status'],
            'tracer_kuliah_jenjang' => $request['tracer_kuliah_jenjang'],
            'tracer_kuliah_jurusan' => $request['tracer_kuliah_jurusan'],
            'tracer_kuliah_linier' => $request['tracer_kuliah_linier'],
            'tracer_kuliah_alamat' => $request['tracer_kuliah_alamat'],
        ]);


        TracerKerja::create([
            'id_alumni' => $alumni->id_alumni,
            'tracer_kerja_pekerjaan' => $request['tracer_kerja_pekerjaan'],
            'tracer_kerja_nama' => $request['tracer_kerja_nama'],
            'tracer_kerja_jabatan' => $request['tracer_kerja_jabatan'],
            'tracer_kerja_status' => $request['tracer_kerja_status'],
            'tracer_kerja_lokasi' => $request['tracer_kerja_lokasi'],
            'tracer_kerja_alamat' => $request['tracer_kerja_alamat'],
            'tracer_kerja_tgl_mulai' => $request['tracer_kerja_tgl_mulai'],
            'tracer_kerja_gaji' => $request['tracer_kerja_gaji'],
        ]);


        return redirect()->route('alumni.dashboard')->with('success', 'Data alumni berhasil ditambahkan!');
    }

    // menampilkan data user yang  login 




    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_alumni)
    {
        $alumni = Alumni::where('id_alumni', $id_alumni)->first();

        if (!$alumni) {
            return redirect()->back()->with('error', 'Data alumni tidak ditemukan.');
        }
        // Hapus data terkait di model lain
        // Cari User berdasarkan email alumni
        User::where('email', $alumni->email)->delete();
        TracerKerja::where('id_alumni', $id_alumni)->delete();
        TracerKuliah::where('id_alumni', $id_alumni)->delete();
        $alumni->delete();

        return redirect()->route('admin.alumni')->with('success', 'Data alumni berhasil dihapus.');
    }

}
