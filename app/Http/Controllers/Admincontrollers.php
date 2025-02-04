<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class Admincontrollers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(auth()->user());
        $alumni = Alumni::all();
        return view('admin.dashboard' , compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
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
        //
    }

    // Menampilkan Dashboard Admin
    // public function dashboard()
    // {
    //     $alumni = Alumni::all();
    //     return view('admin.dashboard', compact('alumni'));
    // }

    // Menampilkan Detail Alumni
  

    // Menghapus Data Alumni
    public function delete($id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data alumni berhasil dihapus.');
    }
}
