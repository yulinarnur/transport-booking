<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;
use Illuminate\Support\Facades\DB;


class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = Region::first();

        DB::table('office')->insert([
            'office_type' => 'Kantor Pusat',
            'address' => 'Jalan Contoh No. 123',
            'region_id' => $region->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}