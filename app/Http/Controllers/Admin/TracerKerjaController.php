<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TracerKerja;
use Illuminate\Http\Request;

class TracerKerjaController extends Controller
{
    // Fungsi untuk menampilkan data tracer kerja
    public function index()
    {
        $tracerKerja = TracerKerja::all();
        return view('admin.tracerkerja.index', compact('tracerKerja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua data bidang keahlan dari tabel
     $tracerKerja = TracerKerja::all();
     // Mengirim data ke view registrasi
     return view('admin.tracerkerja.tambah', compact('tracerKerja'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_tracer_kerja)
    {
        // Cari data tracer kerja berdasarkan ID
        $tracerKerja = TracerKerja::findOrFail($id_tracer_kerja);

        // Return ke view dengan data tracer kerja
        return view('admin.show.tracer_kerja', compact('tracerKerja'));
    }

    public function edit($id)
    {
        // $tracerKerja = TracerKerja::findOrFail($id);
        // return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama_alumni' => 'required|max:50',
        //     'isi_testimoni' => 'required|max:500',
        // ]);

        // $tracerKerja = TracerKerja::findOrFail($id);
        // $tracerKerja->update($request->only(['nama_alumni', 'isi_testimoni']));

        // return redirect()->route('admin.testimoni.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tracerKerja = TracerKerja::findOrFail($id);
        $tracerKerja->delete();

        return redirect()->back()->with('success', 'Data status alumni berhasil dihapus.');
    }
}
