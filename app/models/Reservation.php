<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'parking_slot_id',
        'nama_pengemudi',
        'nomor_telepon',
        'plat_nomor',
        'jenis_kendaraan',
        'metode_pembayaran',
        'total_biaya',
        'status',
        'waktu_masuk',
    ];

    public function parkingSlot(): BelongsTo
    {
        return $this->belongsTo(ParkingSlot::class, 'parking_slot_id');
    }
}
