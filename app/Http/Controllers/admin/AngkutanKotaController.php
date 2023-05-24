<?php

namespace App\Http\Controllers\admin;

use App\Models\Angkot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AngkutanKotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $angkots = Angkot::all();
        return view('angkot', [
            "title" => "Angkot",
            "halaman" => "Data Angkot",
            "angkots" => $angkots
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
            'no' => 'required|unique:angkots|max:10',
            'nama_angkot' => 'required|max:255',
            'warna' => 'required|max:255',
        ]);

        $angkot = Angkot::create([
            'no' => $validated['no'],
            'nama_angkot' => $validated['nama_angkot'],
            'warna' => $validated['warna']
        ]);

        return redirect()->route('angkot.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $angkot = Angkot::where('id', $id)->first();
        return view('admin.angkotEdit', [
            "title" => "Edit Angkot",
            "halaman" => "Edit Data Angkot",
            'angkot' => $angkot
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $angkot = Angkot::findOrFail($id);

        if ($request->no == $angkot->no) {
            $validated = $request->validate([
                'no' => 'required',
                'nama_angkot' => 'required|max:255',
                'warna' => 'required|max:255',
            ]);
        } else {
            $validated = $request->validate([
                'no' => 'required|unique:angkots|max:10',
                'nama_angkot' => 'required|max:255',
                'warna' => 'required|max:255',
            ]);
        }

        $angkot->update([
            'no' => $validated['no'],
            'nama_angkot' => $validated['nama_angkot'],
            'warna' => $validated['warna']
        ]);

        if($angkot){
            //redirect dengan pesan sukses
            return redirect()->route('angkot.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('angkot.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Angkot::destroy($id);
        return redirect()->route('angkot.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
