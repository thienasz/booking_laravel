<?php

namespace App\Core\Models;

class VehicleType extends Model
{
    public $table = 'vehicle_types';

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'vehicle_type_id');
    }
}
