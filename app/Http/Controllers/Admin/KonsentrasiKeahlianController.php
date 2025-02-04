<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KonsentrasiKeahlian;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;

class KonsentrasiKeahlianController extends Controller
{
    // Fungsi untuk menampilkan data konsentrasi keahlian
    public function index()
    {
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        return view('admin.konsentrasikeahlian.index', compact('konsentrasiKeahlian'));
    }

    public function tambah()
    {
        $programKeahlian = ProgramKeahlian::all();
        return view("admin.konsentrasikeahlian.tambah", compact("programKeahlian"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua data bidang keahlan dari tabel
     $programKeahlian = KonsentrasiKeahlian::all();
     // Mengirim data ke view registrasi
     return view('admin.konsentrasikeahlian.tambah', compact('programKeahlian'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_program_keahlian'=> 'required|exists:tbl_program_keahlian,id_program_keahlian',
            'kode_konsentrasi_keahlian' => 'required|max:10',
            'konsentrasi_keahlian' => 'required|max:100',
        ]);

        KonsentrasiKeahlian::create([
            'id_program_keahlian' => $request->id_program_keahlian,
            'kode_konsentrasi_keahlian' => $request->kode_konsentrasi_keahlian,
            'konsentrasi_keahlian' => $request->konsentrasi_keahlian,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $konsentrasi = KonsentrasiKeahlian::findOrFail($id);
        return view('admin.konsentrasi_keahlian.edit', compact('konsentrasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_program_keahlian'=> 'required|exists:tbl_program_keahlian,id_program_keahlian',
            'kode_konsentrasi_keahlian' => 'required|max:10',
            'konsentrasi_keahlian' => 'required|max:100',
        ]);

        KonsentrasiKeahlian::update([
            'kode_konsentrasi_keahlian' => $request->kode_konsentrasi_keahlian,
            'konsentrasi_keahlian' => $request->konsentrasi_keahlian,
        ]);

        return redirect()->route('admin.konsentrasi.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $konsentrasi = KonsentrasiKeahlian::findOrFail($id);
        $konsentrasi->delete();

        return redirect()->route('admin.konsentrasi.index')->with('success', 'Data berhasil dihapus.');
    }
}
