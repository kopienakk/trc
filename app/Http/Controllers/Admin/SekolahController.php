<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
     // Menampilkan semua data sekolah
     public function index()
     {
         $sekolah = Sekolah::all();
         return view('admin.sekolah.index', compact('sekolah'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // Menyimpan data sekolah baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|max:100',
            'alamat' => 'required|max:255',
        ]);

        Sekolah::create([
            'nama_sekolah' => $request->nama_sekolah,
            'alamat' => $request->alamat,
        ]);

        return redirect()->back()->with('success', 'Data sekolah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // Menampilkan form edit sekolah
    public function edit($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        return view('admin.sekolah.edit', compact('sekolah'));
    }

    // Memperbarui data sekolah
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sekolah' => 'required|max:100',
            'alamat' => 'required|max:255',
        ]);

        $sekolah = Sekolah::findOrFail($id);
        $sekolah->update([
            'nama_sekolah' => $request->nama_sekolah,
            'alamat' => $request->alamat,
        ]);

        return redirect()->back()->with('success', 'Data sekolah berhasil diperbarui.');
    }

    // Menghapus data sekolah
    public function destroy($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->delete();

        return redirect()->back()->with('success', 'Data sekolah berhasil dihapus.');
    }
}
