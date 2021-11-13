<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorieSeed::class);
        $this->call(ExperienceSeed::class);
        $this->call(UserSeed::class);
        $this->call(UbicationSeed::class);
        $this->call(SalarySeed::class);
        // \App\Models\User::factory(10)->create();
    }
}
