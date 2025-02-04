<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    // Fungsi untuk menampilkan data testimoni
    public function index()
    {
        $testimoni = Testimoni::all();
        return view('admin.testimoni.index', compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimoni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_alumni' => 'required|max:50',
            'isi_testimoni' => 'required|max:500',
        ]);

        Testimoni::create($request->only(['nama_alumni', 'isi_testimoni']));

        return redirect()->route('admin.testimoni.index')->with('success', 'Data berhasil ditambahkan.');
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
    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alumni' => 'required|max:50',
            'isi_testimoni' => 'required|max:500',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        $testimoni->update($request->only(['nama_alumni', 'isi_testimoni']));

        return redirect()->route('admin.testimoni.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Data berhasil dihapus.');
    }
}
