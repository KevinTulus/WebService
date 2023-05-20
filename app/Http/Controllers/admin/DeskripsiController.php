<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Deskripsi;
use Illuminate\Http\Request;

class DeskripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $harga_per_kilometer = Deskripsi::first()->pluck('harga_per_kilometer');
        $harga_per_kilometer = $harga_per_kilometer[0];
        return view('deskripsi', [
            "title" => "Deskripsi",
            "halaman" => "Data Deskripsi",
            'harga_per_kilometer' => $harga_per_kilometer
        ]);
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
        $validated = $request->validate([
            'harga_per_kilometer' => 'required|max:255',
        ]);

        $deskripsi = Deskripsi::where('id', 1)->first();

        $deskripsi->update([
            'harga_per_kilometer' => $validated['harga_per_kilometer'],
        ]);

        return redirect()->route('deskripsi.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
}
