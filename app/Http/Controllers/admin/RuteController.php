<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Angkot;
use App\Models\Rute;
use App\Models\StreetName;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rutes = Rute::join('angkots', 'rutes.angkot_id', '=', 'angkots.id')
                    ->join('street_names', 'rutes.street_name_id', '=', 'street_names.id')
                    ->orderBy('no', 'asc')
                    ->select('no', 'nama_jalan', 'rutes.id', 'urutan')
                    ->get();
        $angkots = Angkot::all();
        $jalans = StreetName::all();
        return view('rute', [
            "title" => "Rute",
            "halaman" => "Data Rute Lintasan Angkot",
            "rutes" => $rutes,
            "angkots" => $angkots,
            "jalans" => $jalans,
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
    public function store(Request $request, string $id)
    {
        $validated = $request->validate([
            'street_name_id' => 'required',
            'urutan' => 'required|max:255',
        ]);

        $allRute = Rute::where('angkot_id', $id)
                        ->orderBy('urutan', 'desc')
                        ->get();
        $urutan = $validated['urutan'];

        foreach ($allRute as $key => $value) {
            if ($value->urutan >= $urutan) {
                $query = Rute::where('id', $value->id)->first();
                $query->increment('urutan');
            }
        }

        $rute = Rute::create([
            'angkot_id' => $id,
            'street_name_id' => $validated['street_name_id'],
            'urutan' => $validated['urutan']
        ]);

        return redirect()->route('rute.show', $id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rutes = Rute::join('angkots', 'rutes.angkot_id', '=', 'angkots.id')
                    ->join('street_names', 'rutes.street_name_id', '=', 'street_names.id')
                    ->where('angkot_id', $id)
                    ->orderBy('urutan', 'asc')
                    ->select('no', 'nama_jalan', 'rutes.id', 'urutan')
                    ->get();
        $angkot = Angkot::where('id', $id)->first();
        $jalans = StreetName::all();
        return view('admin.rute', [
            "title" => "Rute",
            "halaman" => "Data Rute Lintasan Angkot",
            "rutes" => $rutes,
            "angkot" => $angkot,
            "jalans" => $jalans,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $theRute = Rute::where('id', $id)->first();
        $rutes = Rute::where('angkot_id', $theRute->angkot_id)
                    ->orderBy('urutan', 'asc')
                    ->get();
        $jalans = StreetName::all();
        return view('admin.ruteEdit', [
            "title" => "Edit Rute",
            "halaman" => "Edit Data Rute",
            'theRute' => $theRute,
            'rutes' => $rutes,
            "jalans" => $jalans
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'street_name_id' => 'required',
            'urutan' => 'required|max:255',
        ]);
        $rute = Rute::findOrFail($id);

        $allRute = Rute::where('angkot_id', $rute->angkot_id)
                        ->orderBy('urutan', 'desc')
                        ->get();
        $target = $validated['urutan'];

        if ($target > $rute->urutan) {
            foreach ($allRute as $key => $value) {
                if ($value->urutan <= $target && $value->urutan > $rute->urutan) {
                    $query = Rute::where('id', $value->id)->first();
                    $query->decrement('urutan');
                }
            }
        } elseif ($target < $rute->urutan) {
            foreach ($allRute as $key => $value) {
                if ($value->urutan >= $target && $value->urutan < $rute->urutan) {
                    $query = Rute::where('id', $value->id)->first();
                    $query->increment('urutan');
                }
            }
        }

        $rute->update([
            'angkot_id' => $rute->angkot_id,
            'street_name_id' => $validated['street_name_id'],
            'urutan' => $validated['urutan']
        ]);

        if($rute){
            //redirect dengan pesan sukses
            return redirect()->route('rute.show', $rute->angkot_id)->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('rute.show', $rute->angkot_id)->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $angkot = Rute::where('id', $id)->first();
        Rute::destroy($id);
        return redirect()->route('rute.show', $angkot->angkot_id)->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
