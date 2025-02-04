<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TracerKuliah;
use Illuminate\Http\Request;

class TracerKuliahController extends Controller
{
    // Fungsi untuk menampilkan data tracer kuliah
    public function index()
    {
        $tracerKuliah = TracerKuliah::all();
        return view('admin.tracerkuliah.index', compact('tracerKuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua data bidang keahlan dari tabel
     $tracerKuliah = TracerKuliah::all();
     // Mengirim data ke view registrasi
     return view('admin.tracerkuliah.tambah', compact('tracerKuliah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show($id_tracer_kuliah)
    {
        // Cari data tracer kuliah berdasarkan ID
        $tracerKuliah = TracerKuliah::findOrFail($id_tracer_kuliah);

        // Return ke view dengan data tracer kuliah
        return view('admin.show.tracer_kuliah', compact('tracerKuliah'));
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
    public function destroy(string $id)
    {
        $tracerKuliah = TracerKuliah::findOrFail($id);
        $tracerKuliah->delete();

        return redirect()->back()->with('success', 'Data status alumni berhasil dihapus.');
    }
}
