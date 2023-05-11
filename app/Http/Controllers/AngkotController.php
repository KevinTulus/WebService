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
            $Angkots[$key]['nama_jalan'] = Rute::join('street_names', 'rutes.street_names_id', '=', 'street_names.id')
                                                ->where('angkot_id' ,$value['id'])
                                                ->pluck('nama_jalan');
        }
        return $Angkots;
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    public function show(string $id)
    {
        $angkot = Angkot::where('id', $id)->select('id', 'no', 'nama_angkot', 'warna')->first();
        $angkot['nama_jalan'] = Rute::join('street_names', 'rutes.street_names_id', '=', 'street_names.id')
                                    ->where('angkot_id', $angkot['id'])
                                    ->pluck('nama_jalan');
        return $angkot;
    }

    /**
     * Display angkot going to that place.
     */
    public function angkotTo(string $nama_jalan)
    {
        $angkot_id = Rute::join('street_names', 'rutes.street_names_id', '=', 'street_names.id')
                    ->leftJoin('lokasis', 'street_names.id', '=', 'lokasis.street_name_id')
                    ->where('nama_jalan', 'like', '%'.$nama_jalan.'%')
                    ->orWhere('nama_lokasi', 'like', '%'.$nama_jalan.'%')
                    ->pluck('angkot_id')
                    ->unique();

        $angkot = array();
        foreach ($angkot_id as $key => $value) {
            $angkot[] = Angkot::where('id', $value)->select('id', 'no', 'nama_angkot', 'warna')->first();
            $angkot[] = Rute::join('street_names', 'rutes.street_names_id', '=', 'street_names.id')
                                        ->where('angkot_id', $value)
                                        ->pluck('nama_jalan');
        }

        return $angkot;
    }

}
