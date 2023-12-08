<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt(12345678),
                'level' => 1
            ],
            [
                'name' => 'Supervisor',
                'email' => 'supervior@gmail.com',
                'password' => bcrypt(12345678),
                'level' => 2
            ],
            [
                'name' => 'Manajer',
                'email' => 'manajer@gmail.com',
                'password' => bcrypt(12345678),
                'level' => 3
            ],
        ];

        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}
