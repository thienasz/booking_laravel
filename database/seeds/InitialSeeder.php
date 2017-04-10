<?php

use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Core\Models\Station::class, 5)->create();
        factory(\App\Core\Models\ServiceProvider::class, 25)->create();
        factory(\App\Core\Models\VehicleType::class, 2)->create();
        factory(\App\Core\Models\Vehicle::class, 50)->create();
        factory(\App\Core\Models\TicketAgent::class, 25)->create();
        factory(\App\Core\Models\VehicleSchedule::class, 200)->create();
    }
}