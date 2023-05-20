<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use App\Models\StreetName;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasis = Lokasi::join('street_names', 'lokasis.street_name_id', '=', 'street_names.id')
                        ->select('lokasis.id', 'nama_jalan', 'nama_lokasi')
                        ->get();
        $jalans = StreetName::all();
        return view('lokasi', [
            "title" => "Lokasi",
            "halaman" => "Data Lokasi",
            "lokasis" => $lokasis,
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
            'street_name_id' => 'required',
            'nama_lokasi' => 'required|max:255',
        ]);

        $lokasi = Lokasi::create([
            'street_name_id' => $validated['street_name_id'],
            'nama_lokasi' => $validated['nama_lokasi']
        ]);

        return redirect()->route('lokasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $lokasi = Lokasi::where('id', $id)->first();
        $jalans = StreetName::all();
        // dd($jalans->where('id', $lokasi->street_name_id));
        // dd($lokasi->street_name_id);
        return view('admin.lokasiEdit', [
            "title" => "Edit Lokasi",
            "halaman" => "Edit Data Lokasi",
            'lokasi' => $lokasi,
            "jalans" => $jalans
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $validated = $request->validate([
            'street_name_id' => 'required',
            'nama_lokasi' => 'required|max:255',
        ]);

        $lokasi->update([
            'street_name_id' => $validated['street_name_id'],
            'nama_lokasi' => $validated['nama_lokasi']
        ]);

        if($lokasi){
            //redirect dengan pesan sukses
            return redirect()->route('lokasi.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('lokasi.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lokasi::destroy($id);
        return redirect()->route('lokasi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
