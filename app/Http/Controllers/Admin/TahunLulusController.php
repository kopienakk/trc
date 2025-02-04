<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunLulus;
use Illuminate\Http\Request;

class TahunLulusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Mengambil semua data tahun lulus dari tabel
     $tahunLulus = TahunLulus::all();
     // Mengirim data ke view registrasi
     return view('admin.tahunlulus.index', compact('tahunLulus'));
    }

    public function tambah()
    {
        return view("admin.tahunlulus.tambah");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // Menyimpan data tahun lulus baru
    public function store(Request $request)
    {

        $request->validate([
            'tahun_lulus' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        TahunLulus::create([
            'tahun_lulus' => $request->tahun_lulus,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->back()->with('success', 'Data tahun lulus berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // Menampilkan form edit tahun lulus
    public function edit($id)
    {
        $tahunLulus = TahunLulus::findOrFail($id);
        return view('admin.tahun_lulus.edit', compact('tahunLulus'));
    }

    // Memperbarui data tahun lulus
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_lulus' => 'required|max',
            'keterangan' => 'nullable|string',
        ]);

        $tahunLulus = TahunLulus::findOrFail($id);
        $tahunLulus->update([
            'tahun_lulus' => $request->tahun_lulus,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Data tahun lulus berhasil diperbarui.');
    }

    // Menghapus data tahun lulus
    public function destroy($id)
    {
        $tahunLulus = TahunLulus::findOrFail($id);
        $tahunLulus->delete();

        return redirect()->back()->with('success', 'Data tahun lulus berhasil dihapus.');
    }
}
