<?php

namespace App\Core\Models;

class ServiceProvider extends Model
{
    public $table = 'service_providers';

    public function ticketAgents()
    {
        return $this->hasMany(TicketAgent::class, 'service_provider_id');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'service_provider_id');
    }
}
