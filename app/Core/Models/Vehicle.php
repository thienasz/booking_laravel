<?php

namespace App\Core\Models;

class Vehicle extends Model
{
    public $table = 'vehicles';

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function vehicleSchedules()
    {
        return $this->hasMany(VehicleSchedule::class, 'vehicle_id');
    }
}
