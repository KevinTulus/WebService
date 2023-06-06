<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use App\Models\Angkot;
use App\Models\Lokasi;
use App\Models\Deskripsi;
use App\Models\StreetName;

class AngkotController extends Controller
{
    public function cari(string $nama_jalan)
    {
        return Rute::join('street_names', 'rutes.street_name_id', '=', 'street_names.id')
            ->leftJoin('lokasis', 'street_names.id', '=', 'lokasis.street_name_id')
            ->where('nama_jalan', 'like', '%' . $nama_jalan . '%')
            ->orWhere('nama_lokasi', 'like', '%' . $nama_jalan . '%')
            ->pluck('angkot_id')
            ->unique();
    }

    public function harga(string $id)
    {
        $harga_temp = 0;
        $hargaPerKilometer = Deskripsi::first('harga_per_kilometer');

        $harga = Rute::join('street_names', 'rutes.street_name_id', '=', 'street_names.id')
            ->where('angkot_id', $id)
            ->get(['nama_jalan', 'urutan', 'km']);

        foreach ($harga as $key => $value) {
            $harga_temp += $harga[$key]['km'] * $hargaPerKilometer['harga_per_kilometer'];
            $harga[$key]['harga'] = $harga_temp;
        }

        return $harga;
    }

    public function allAngkot()
    {
        $angkots = Angkot::get(['id', 'no', 'nama_angkot', 'warna']);
        foreach ($angkots as $key => $value) {
            $angkots[$key]['rute'] = $this->harga($angkots[$key]['id']);
            $angkots[$key] = $angkots[$key]->only('no', 'nama_angkot', 'warna', 'rute');
        }
        return response()->json(['data' => $angkots], 200);
    }

    public function oneAngkot(string $no)
    {
        $angkot = Angkot::where('no', $no)->select('id', 'no', 'nama_angkot', 'warna')->first();
        if (!$angkot) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        $angkot['rute'] = $this->harga($angkot['id']);
        $angkot = $angkot->only('no', 'nama_angkot', 'warna', 'rute');
        return response()->json(['data' => $angkot], 200);
    }

    public function allJalan()
    {
        $jalan = StreetName::get(['nama_jalan', 'km']);
        return response()->json(['data' => $jalan], 200);
    }

    public function allLokasi()
    {
        $lokasi = Lokasi::join('street_names', 'lokasis.street_name_id', '=', 'street_names.id')
            ->get(['nama_lokasi', 'nama_jalan', 'km']);
        return response()->json(['data' => $lokasi], 200);
    }

    public function angkotTo(string $nama_jalan)
    {
        $angkot_id = $this->cari($nama_jalan);
        if ($angkot_id->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        foreach ($angkot_id as $key => $value) {
            $angkot[$key] = Angkot::where('id', $value)->select('id', 'no', 'nama_angkot', 'warna')->first();
            $angkot[$key]['rute'] = $this->harga($value);
            $angkot[$key] = $angkot[$key]->only('no', 'nama_angkot', 'warna', 'rute');
        }
        return response()->json(['data' => $angkot], 200);
    }

    public function angkotBetween(string $nama_jalan1, string $nama_jalan2)
    {
        $angkot_id1 = $this->cari($nama_jalan1);
        if ($angkot_id1->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        $angkot_id2 = $this->cari($nama_jalan2);
        if ($angkot_id2->isEmpty()) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
        $angkot_id = $angkot_id1->intersect($angkot_id2);
        foreach ($angkot_id as $key => $value) {
            $angkot[$key] = Angkot::where('id', $value)->select('id', 'no', 'nama_angkot', 'warna')->first();
            $angkot[$key]['rute'] = $this->harga($value);
            $angkot[$key] = $angkot[$key]->only('no', 'nama_angkot', 'warna', 'rute');
        }
        return response()->json(['data' => $angkot], 200);
    }
}
