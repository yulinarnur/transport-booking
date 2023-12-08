<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'address',
        'telp'
    ];

    public function transports() {
        return $this->hasMany(Transport::class);
    }
}