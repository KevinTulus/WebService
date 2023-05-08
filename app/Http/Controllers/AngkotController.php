<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use App\Models\Angkot;
use Illuminate\Http\Request;

class AngkotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Angkot::join('rutes', 'angkots.id', '=', 'rutes.angkot_id')
                        ->select('angkots.id', 'no', 'nama_angkot', 'warna', 'nama_jalan', )
                        ->get();
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
        // return Angkot::select('id', 'no', 'nama_angkot', 'warna')->find($id);

        $angkot = Angkot::select('id', 'no', 'nama_angkot', 'warna')->find($id);
        $angkot['rute'] = Rute::where('angkot_id' ,$id)->get('nama_jalan')->implode('nama_jalan', '->');
        // dd($rute[1]->nama_jalan);
        return $angkot;
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
