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
        $Angkots = Angkot::select('id', 'no', 'nama_angkot', 'warna')->get();
        foreach ($Angkots as $key => $value) {
            $Angkots[$key]['nama_jalan'] = Rute::where('angkot_id' ,$value['id'])->get()->pluck('nama_jalan');
        }
        return $Angkots;
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
    // public function show(string $id)
    public function show(string $id)
    {
        return $id;
        // $angkot = Angkot::where('id', $id)->select('id', 'no', 'nama_angkot', 'warna')->first();
        // $angkot['nama_jalan'] = Rute::where('angkot_id', $angkot['id'])->get()->pluck('nama_jalan');
        // return $angkot;
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

    /**
     * Display angkot going to that place.
     */
    public function checkRequest(Request $request, string $id)
    {
        if ($request->has('type')) {
            return $request;
        } else {
            // return redirect()->action([AngkotController::class, 'index']);
            // return $id;
            return redirect()->action(
                [AngkotController::class, 'show'], ['id' => $id]
            );
        }
    }

    /**
     * Display angkot going to that place.
     */
    public function angkotTo(Request $request, string $nama_jalan)
    {
        //
    }

    /**
     * Display angkot from that place.
     */
    public function angkotFrom(Request $request, string $nama_jalan)
    {
        //
    }
}
