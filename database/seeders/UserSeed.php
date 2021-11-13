<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'cesar',
            'email' =>'cesar@com',
            'password' =>'123456789',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' =>'cesarperez',
            'email' =>'cesar@gmail.com',
            'password' =>'123456789',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}
