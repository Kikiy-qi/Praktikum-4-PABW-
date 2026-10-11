<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ParkingSlot;
use App\Models\Reservation;
use Faker\Factory as Faker;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $slotIds = ParkingSlot::pluck('id')->toArray();

        for ($i = 0; $i < 15; $i++) {
            $prefix = $faker->randomElement(['B', 'D', 'F', 'T', 'L']);
            $number = $faker->numberBetween(1000, 9999);
            $suffix = strtoupper($faker->lexify('???'));

            Reservation::create([
                'parking_slot_id'   => $faker->randomElement($slotIds),
                'nama_pengemudi'    => $faker->name(),
                'nomor_telepon'     => $faker->phoneNumber(),
                'plat_nomor'        => $prefix . ' ' . $number . ' ' . $suffix,
                'jenis_kendaraan'   => $faker->randomElement(['Mobil', 'Motor']),
                'metode_pembayaran' => $faker->randomElement(['QRIS', 'Transfer Bank']),
                'total_biaya'       => $faker->numberBetween(4, 20) * 1000,
                'status'            => $faker->randomElement(['Aktif', 'Selesai']),
                'waktu_masuk'       => $faker->dateTimeBetween('-1 month', 'now'),
            ]);
        }
    }
}
