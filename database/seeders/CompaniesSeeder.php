<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
    */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'company_name' => 'PT. Buda Inovasi Indonesia',
                'address' => 'Jl. Soekarno Hatta No. 1, Malang',
                'telp' => '08823112412',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_name' => 'PT. Bukit Raya',
                'address' => 'Jl. Sukamulyo No. 2, Jember',
                'telp' => '083141142',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
