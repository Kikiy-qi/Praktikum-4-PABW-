<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ParkingSlot;

class ParkingSlotSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = ['A', 'B', 'C'];

        foreach ($blocks as $block) {
            for ($i = 1; $i <= 5; $i++) {
                ParkingSlot::create([
                    'kode_slot' => $block . '-0' . $i,
                    'lantai' => 'Lantai ' . ($block === 'C' ? '2' : '1'),
                    'tipe_kendaraan' => $block === 'B' ? 'Motor' : 'Mobil',
                    'tarif_per_jam' => $block === 'B' ? 2000 : 4000,
                    'status' => 'Tersedia',
                ]);
            }
        }
    }
}
