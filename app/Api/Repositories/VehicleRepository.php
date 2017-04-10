<?php

namespace App\Api\Repositories;

use App\Core\Models\ServiceProvider;
use App\Core\Models\Station;
use App\Core\Models\TicketAgent;
use App\Core\Models\Vehicle;
use App\Core\Repositories\Repository;

class VehicleRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected function model()
    {
        return Vehicle::class;
    }

    public function getVehicleById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getList()
    {
        return $this->model->all();
    }
}