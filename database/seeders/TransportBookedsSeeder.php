<?php

namespace Database\Seeders;

use App\Models\Transport;
use App\Models\User;
use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransportBookedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get id transport, user
        $transportIds = Transport::all()->pluck('id')->toArray();
        $userIds = User::where('level', '>', 1)->pluck('id')->toArray();
        $driverIds = Driver::all()->pluck('id')->toArray(); 

        for ($i = 0; $i < 10; $i++) {
            DB::table('transport_bookeds')->insert([
                'transport_id' => $transportIds[array_rand($transportIds)],
                'approver_id' => $userIds[array_rand($userIds)],
                'driver_id' => $driverIds[array_rand($driverIds)],
                'status' => ['Menunggu disetujui', 'Disetujui', 'Ditolak'][array_rand(['Menunggu disetujui', 'Disetujui', 'Ditolak'])],
                'booked_date' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}