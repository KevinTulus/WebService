<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StreetName;
use Illuminate\Http\Request;

class JalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jalans = StreetName::all();
        return view('namajalan', [
            "title" => "Nama Jalan",
            "halaman" => "Data Nama Jalan",
            "jalans" => $jalans
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
            'nama_jalan' => 'required|max:255',
            'km' => 'required|max:255',
        ]);

        $jalan = StreetName::create([
            'nama_jalan' => $validated['nama_jalan'],
            'km' => $validated['km']
        ]);

        return redirect()->route('jalan.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $jalan = StreetName::where('id', $id)->first();
        return view('admin.jalanEdit', [
            "title" => "Edit Jalan",
            "halaman" => "Edit Data Jalan",
            'jalan' => $jalan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jalan = StreetName::findOrFail($id);

        $validated = $request->validate([
            'nama_jalan' => 'required|max:255',
            'km' => 'required|max:255',
        ]);

        $jalan->update([
            'nama_jalan' => $validated['nama_jalan'],
            'km' => $validated['km']
        ]);

        if($jalan){
            //redirect dengan pesan sukses
            return redirect()->route('jalan.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('jalan.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        StreetName::destroy($id);
        return redirect()->route('jalan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
