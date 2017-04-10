<?php

namespace App\Core\Models;

class Station extends Model
{
    public $table = 'stations';

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }

    public function vehicleStarts()
    {
        return $this->belongsToMany(Vehicle::class, 'vehicle_schedules', 'station_start_id', 'vehicle_id');
    }

    public function vehicleEnds()
    {
        return $this->belongsToMany(Vehicle::class, 'vehicle_schedules', 'station_end_id', 'vehicle_id');
    }
}
