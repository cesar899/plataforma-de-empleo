<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubications')->insert([
            'name' =>'Remoto',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        DB::table('ubications')->insert([
            'name' =>'Usa',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
        DB::table('ubications')->insert([
            'name' =>'Canada',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
        DB::table('ubications')->insert([
            'name' =>'Mexico',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        DB::table('ubications')->insert([
            'name' =>'Colombia',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        DB::table('ubications')->insert([
            'name' =>'España',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        DB::table('ubications')->insert([
            'name' =>'Argentina',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        DB::table('ubications')->insert([
            'name' =>'Venezuela',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}
