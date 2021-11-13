<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
          'name' =>'Front-end',
          'created_at' => Carbon::now(),
          'updated_at'  => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' =>'Back-end',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' =>'Full stack',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' =>'DevOps',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
       ]);

       DB::table('categories')->insert([
            'name' =>'DBA',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
       ]);
        //Diseño y interfax de usuario
        DB::table('categories')->insert([
            'name' =>'UX / UI',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' =>'techlead',
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}
