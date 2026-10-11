<?php

namespace App\Http\Controllers;

use App\Models\ParkingSlot;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $slots = ParkingSlot::all();
        $available_slots = ParkingSlot::where('status', 'Tersedia')->count();

        return view('pages.reservasi', compact('slots', 'available_slots'));
    }

    public function proses(Request $request)
    {
        $slotId = $request->input('slot_id') ?? $request->input('parking_slot_id');
        $nama = $request->input('name') ?? $request->input('driver_name') ?? 'Pengemudi';
        $phone = $request->input('phone') ?? '-';
        $plate = strtoupper($request->input('plate') ?? $request->input('plate_number') ?? 'B 1234 XX');
        $vehicleType = $request->input('vehicle_type') ?? 'Mobil';
        $paymentMethod = $request->input('payment_method') ?? 'QRIS';
        $totalBiaya = $request->input('total_biaya') ?? 4000;

        Reservation::create([
            'parking_slot_id'   => $slotId,
            'nama_pengemudi'    => $nama,
            'nomor_telepon'     => $phone,
            'plat_nomor'        => $plate,
            'jenis_kendaraan'   => ucfirst($vehicleType),
            'metode_pembayaran' => $paymentMethod,
            'total_biaya'       => (int) $totalBiaya,
            'status'            => 'Aktif',
            'waktu_masuk'       => now(),
        ]);

        return redirect()->route('reservasi.form')->with('success', 'Reservasi berhasil disimpan ke database!');
    }

    public function dataParkir(Request $request)
    {
        $query = Reservation::with('parkingSlot')->latest();

        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function ($sub) use ($q) {
                $sub->where('plat_nomor', 'like', "%{$q}%")
                    ->orWhere('nama_pengemudi', 'like', "%{$q}%");
            });
        }

        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        $data_kendaraan = $query->get();

        return view('data-parkir', compact('data_kendaraan'));
    }
}