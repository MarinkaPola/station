<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Station;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     */
    public function run()
    {
        Station::factory(15)->create();

    }

}
