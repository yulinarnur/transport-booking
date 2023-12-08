<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Companies;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'no_pol',
        'transport_type',
        'status',
        'bbm_consume',
        'service_schedule',
        'image'
    ];

    public function company() {
        return $this->belongsTo(Companies::class, 'company_id');
    }
}