<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportBooked extends Model
{
    use HasFactory;

    protected $table = 'transport_bookeds';

    protected $fillable = [
        'transport_id',
        'approver_id',
        'booked_date',
        'status',
        'driver_id'
    ];

    // relasi dgn tabel transport
    public function transport(){
        return $this->belongsTo(Transport::class, 'transport_id');
    }

    // relasi dgn tabel user, untuk approval
    public function approver(){
        return $this->belongsTo(User::class, 'approver_id');
    }

    public function driver() {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}