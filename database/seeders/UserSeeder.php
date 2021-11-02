<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'      => 'Arza Rizky Nova Ramadhani',
                'email'     => 'panggilsajarizky@gmail.com',
                'password'  => Hash::make('arzarizky123'),
                'role'      => 'admin',
            ],
            [
                'name'      => 'Arza Rizky',
                'email'     => 'rizkysaja@gmail.com',
                'password'  => Hash::make('user'),
                'role'      => 'user',
            ],
        ]);
    }
}
