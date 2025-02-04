<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangKeahlian;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;

class ProgramKeahlianController extends Controller
{
    // Fungsi untuk menampilkan data bidang keahlian
    public function index()
    {
        $programKeahlian = ProgramKeahlian::all();
        return view('admin.programkeahlian.index', compact('programKeahlian'));
    }
    public function tambah()
    {
        $bidangKeahlian = BidangKeahlian::all();
        return view("admin.programkeahlian.tambah", compact("bidangKeahlian"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua data bidang keahlan dari tabel
     $bidangKeahlian = BidangKeahlian::all();
     // Mengirim data ke view registrasi
     return view('admin.programkeahlian.tambah', compact('bidangKeahlian'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'id_bidang_keahlian'=> 'required|exists:tbl_bidang_keahlian,id_bidang_keahlian',
            'kode_program_keahlian' => 'required|max:10',
            'program_keahlian' => 'required|max:100',
        ]);

        ProgramKeahlian::create([
            'id_bidang_keahlian' => $request->id_bidang_keahlian, 
            'kode_program_keahlian' => $request->kode_program_keahlian,
            'program_keahlian' => $request->program_keahlian,
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
        $program = ProgramKeahlian::findOrFail($id);
        return view('admin.program_keahlian.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_bidang_keahlian'=> 'required|exists:tbl_bidang_keahlian,id_bidang_keahlian',
            'kode_program_keahlian' => 'required|max:10',
            'program_keahlian' => 'required|max:100',
        ]);

        ProgramKeahlian::update([
            'kode_program_keahlian' => $request->kode_program_keahlian,
            'program_keahlian' => $request->program_keahlian,
        ]);


        return redirect()->route('admin.program.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = ProgramKeahlian::findOrFail($id);
        $program->delete();

        return redirect()->route('admin.program.index')->with('success', 'Data berhasil dihapus.');
    }
}
