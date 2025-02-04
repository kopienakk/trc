<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BidangKeahlian;
use App\Models\KonsentrasiKeahlian;
use App\Models\ProgramKeahlian;
use App\Models\StatusAlumni;
use App\Models\TahunLulus;
use App\Models\User;
use App\Models\Alumni;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        
     // Mengambil semua data tahun lulus dari tabel
     $bidangKeahlian = BidangKeahlian::all();
     $programKeahlian = ProgramKeahlian::all();
     $tahunLulus = TahunLulus::all();
     $konsentrasiKeahlian = KonsentrasiKeahlian::all();
     $statusAlumni = StatusAlumni::all();
     // Mengirim data ke view registrasi
     return view('auth.register', compact('tahunLulus',"bidangKeahlian","programKeahlian", "konsentrasiKeahlian", "statusAlumni"));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $validated = $request->validate([
            'tahun_lulus' => 'required|exists:tbl_tahun_lulus,id_tahun_lulus',
            'id_konsentrasi_keahlian' => 'required|exists:tbl_konsentrasi_keahlian,id_konsentrasi_keahlian',
            'id_status_alumni' => 'required|exists:tbl_status_alumni,id_status_alumni',
            'nisn' => 'required|unique:tbl_alumni,nisn',
            'nik' => 'required|unique:tbl_alumni,nik',
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'akun_fb' => 'nullable|string|max:255',
            'akun_ig' => 'nullable|string|max:255',
            'akun_tiktok' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Tentukan role (admin jika email tertentu)
        $role = $validated['email'] === 'admin@admin.com' ? 'admin' : 'alumni';

        // Simpan user ke tabel `users`
        $user = User::create([
            'name' => $validated['nama_depan'] . ' ' . $validated['nama_belakang'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $role,  // Assign role admin/alumni
        ]);

        // Simpan alumni ke tabel `tbl_alumni`
        Alumni::create([
            'id_tahun_lulus' => $request->tahun_lulus,
            'id_konsentrasi_keahlian' => $validated['id_konsentrasi_keahlian'],
            'id_status_alumni' => $validated['id_status_alumni'],
            'nisn' => $validated['nisn'],
            'nik' => $validated['nik'],
            'nama_depan' => $validated['nama_depan'],
            'nama_belakang' => $validated['nama_belakang'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tgl_lahir' => $validated['tgl_lahir'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
            'akun_fb' => $validated['akun_fb'],
            'akun_ig' => $validated['akun_ig'],
            'akun_tiktok' => $validated['akun_tiktok'],
            'email' => $validated['email'], // Email alumni disamakan dengan users
            'password' => $validated['password'],
        ]);
        dd('Data Alumni Berhasil Disimpan');

        event(new Registered($user));

        return redirect(route('login', absolute: false))->with('success', 'Registrasi berhasil, silakan login.');
    }
}
