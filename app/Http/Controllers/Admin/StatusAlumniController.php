<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatusAlumni;
use Illuminate\Http\Request;

class StatusAlumniController extends Controller
{
    // Menampilkan semua data status alumni
    public function index()
    {
        $statusAlumni = StatusAlumni::all();
        return view('admin.statusalumni.index', compact('statusAlumni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
     return view('admin.statusalumni.tambah');
    }

    // Menyimpan data status alumni baru
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|max:100',
        ]);

        StatusAlumni::create([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Data status alumni berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // Menampilkan form edit status alumni
    public function edit($id)
    {
        $statusAlumni = StatusAlumni::findOrFail($id);
        return view('admin.statusalumni.edit', compact('statusAlumni'));
    }

    // Memperbarui data status alumni
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|max:100',
        ]);

        $statusAlumni = StatusAlumni::findOrFail($id);
        $statusAlumni->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Data status alumni berhasil diperbarui.');
    }

    // Menghapus data status alumni
    public function destroy($id)
    {
        $statusAlumni = StatusAlumni::findOrFail($id);
        $statusAlumni->delete();

        return redirect()->back()->with('success', 'Data status alumni berhasil dihapus.');
    }
}
