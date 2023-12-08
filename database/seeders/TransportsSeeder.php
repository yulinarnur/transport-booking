<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //Data dengan status 'Hak Milik', maka tanpa company_id
         DB::table('transports')->insert([
            'name' => 'Innova',
            'no_pol' => 'N 2910 AGH',
            'transport_type' => 'Angkutan Orang',
            'status' => 'Hak Milik',
            'bbm_consume' => '10 liter/100km',
            'service_schedule' => now()->addMonth(6),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ambil id dari tabel companies
        $company = DB::table('companies')->first();

        // Data dengan status 'Sewa', maka dengan company_id
        DB::table('transports')->insert([
            'company_id' => $company->id,
            'name' => 'Truk',
            'no_pol' => 'P 5223 LS',
            'transport_type' => 'Angkutan Barang',
            'status' => 'Sewa',
            'bbm_consume' => '12 liter/100km',
            'service_schedule' => now()->addMonth(4), 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
