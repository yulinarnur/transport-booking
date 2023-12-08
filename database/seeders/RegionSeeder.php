<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $region = [
            [
                'city_name' => 'Malang',
                'regency' => 'Lowokwaru',
                'province' => 'Jawa Timur'
            ],
            [
                'city_name' => 'Jember',
                'regency' => 'Sumbersari',
                'province' => 'Jawa Timur'
            ],
            [
                'city_name' => 'Bandung',
                'regency' => 'Lembang',
                'province' => 'Jawa Barat'
            ],
        ];

        foreach ($region as $key => $value) {
            Region::create($value);
        }
    }
}
