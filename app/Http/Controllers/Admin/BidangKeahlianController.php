<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangKeahlian;
use Illuminate\Http\Request;

class BidangKeahlianController extends Controller
{
    // Fungsi untuk menampilkan data bidang keahlian
    public function index()
    {
        $bidangKeahlian = BidangKeahlian::all();
        return view('admin.bidangkeahlian.index', compact('bidangKeahlian'));
    }

    public function tambah()
    {
        return view("admin.bidangkeahlian.tambah");
    }

    /**
     * Show the form for creating a new resource.
     */
    
        public function create()
    {
        // Mengambil semua data bidang keahlan dari tabel
        $bidangKeahlian = BidangKeahlian::all();
        // Mengirim data ke view registrasi
        return view('admin.bidangkeahlian.index', compact('bidangKeahlian'));
    }

    // Fungsi untuk menyimpan data bidang keahlian baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_bidang_keahlian' => 'required|max:10',
            'bidang_keahlian' => 'required|max:100',
        ]);
        

        BidangKeahlian::create([
            'id_bidang_keahlian' => $request->id_bidang_keahlian,
            'kode_bidang_keahlian' => $request->kode_bidang_keahlian,
            'bidang_keahlian' => $request->bidang_keahlian,
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


    // Fungsi untuk menampilkan form edit
    public function edit($id)
    {
        $bidangKeahlian = BidangKeahlian::findOrFail($id);
        return view('admin.bidang_keahlian.edit', compact('bidangKeahlian'));
    }


    // Fungsi untuk memperbarui data bidang keahlian
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_bidang_keahlian' => 'required|max:10',
            'bidang_keahlian' => 'required|max:100',
        ]);

        $bidangKeahlian = BidangKeahlian::findOrFail($id);
        $bidangKeahlian->update([
            'kode_bidang_keahlian' => $request->kode_bidang_keahlian,
            'bidang_keahlian' => $request->bidang_keahlian,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    // Fungsi untuk menghapus data bidang keahlian
    public function destroy($id)
    {
        $bidangKeahlian = BidangKeahlian::findOrFail($id);
        $bidangKeahlian->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
