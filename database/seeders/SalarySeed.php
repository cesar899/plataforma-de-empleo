<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salaries')->insert([
            'name' =>'0 - 1000 USD',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
        
        DB::table('salaries')->insert([
            'name' =>'1000 - 2000 USD',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
       
        DB::table('salaries')->insert([
            'name' =>'2000 - 4000 USD',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
        DB::table('salaries')->insert([
            'name' =>'No Mostrar',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}
