<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Presensi;

class PresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $presensi = [
               [
                   'id' => 1,
                   'user_id' => 1,
                   'latitude' => 0.333,
                   'longitude' => 0.333,

               ],
               [
                'id' => 2,
                'user_id' => 1,
                'latitude' => 0.333,
                'longitude' => 0.333
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'latitude' => 0.333,
                'longitude' => 0.333
            ],
        ];
            foreach ($presensi as $storePresensi) {
                Presensi::create($storePresensi);
            }
    }
}
