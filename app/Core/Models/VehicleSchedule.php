<?php

namespace App\Core\Models;

class VehicleSchedule extends Model
{
    public $table = 'vehicle_schedules';

    public function stationStart()
    {
        $this->hasOne(Station::class, 'station_start_id');
    }

    public function stationEnd()
    {
        $this->hasOne(Station::class, 'station_end_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
