<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\KonsentrasiKeahlian;
use App\Models\StatusAlumni;
use App\Models\TahunLulus;
use Illuminate\Http\Request;

class DetailAlumniController extends Controller
{
    //

//
public function dataDiri()
{
    $user = auth()->user(); // Ambil data user yang sedang login
    $alumni = Alumni::where('id_alumni', $user->id_alumni)->first(); // Ambil data alumni dari tabel alumni
    dd($alumni);
    // Jika alumni tidak ditemukan, tampilkan pesan dan redirect ke dashboard
    if (!$alumni) {
        return redirect()->route('alumni.dashboard')->with('warning', 'Isi Tracer Study Dulu Yaaa');
    }

    // Tampilkan data alumni ke view
    return view('alumni.datadiri', compact('alumni'));
}


// Handle profile updates
public function updateProfile(Request $request)
{
    $alumni = Alumni::where('email', auth()->user()->email)->first();

    $validatedData = $request->validate([
        'nama_depan' => 'required|string|max:255',
        'nama_belakang' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'no_hp' => 'required|string|max:20',
        
    ]);

    // Update data alumni
    $alumni->update([
        'nama_depan' => $request->nama_depan,
        'nama_belakang' => $request->nama_belakang,
        'alamat' => $request->almat,
        'no_hp' => $request->no_hp,
        
    ]);

    return redirect()->route('alumni.datadiri')->with('status', 'Data berhasil diperbarui');
}    

// Show the form for tracer study registration
public function create()
{
$user = auth()->user();
//cek alumni
$alumni = Alumni::where('user_id', $user->id)->first();
if($alumni) {
    return redirect()->route('alumni.dashboard')->with('tracer_study_filled', true);
}
    $years = TahunLulus::all();
    $statuses = StatusAlumni::all();
    $concentrations = KonsentrasiKeahlian::all();
    
    return view('tracerstudy.register', compact('years', 'statuses', 'concentrations'));
}

    public function checkDataDiri()
{
    $user = auth()->user();
    $alumni = Alumni::where('user_id', $user->id)->first();

    return response()->json([
        'hasDataDiri' => $alumni ? true : false
    ]);
}

// Show the user data if logged in
public function show()
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $user = auth()->user();
    return view('alumni.datadiri', compact('user'));
}

}