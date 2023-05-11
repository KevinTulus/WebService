<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\Angkot::factory(10)->create();

        \App\Models\StreetName::factory(50)->create();

        for ($i=1; $i < 11 ; $i++) {
            for ($j=1; $j < 11 ; $j++) {
                \App\Models\Rute::factory()->state([
                    'angkot_id' => $i,
                    'urutan' => $j,
                ])->create();
            }
        }

        \App\Models\Lokasi::factory(10)->create();

        DB::table('deskripsis')->insert([
            'harga_per_kilometer' => 2000,
            'jumlah_maksimal' => '10',
            'jam_operasional' => '05.00 - 22.00',
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

// angkot ada 9
