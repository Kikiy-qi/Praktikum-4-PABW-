<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParkingSlot extends Model
{
    use HasFactory;

    protected $table = 'parking_slots';

    protected $fillable = [
        'kode_slot',
        'lantai',
        'tipe_kendaraan',
        'tarif_per_jam',
        'status',
    ];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'parking_slot_id');
    }
}
