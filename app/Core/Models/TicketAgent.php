<?php

namespace App\Core\Models;

class TicketAgent extends Model
{
    public $table = 'ticket_agents';

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }
}
