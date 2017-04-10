<?php

namespace App\Api\Services;

use App\Api\Repositories\VehicleRepository;

class VehicleService extends Service
{
    /**
     * @var VehicleRepository
     */
    private $vehicleRepository;

    function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function getList()
    {
        return $this->vehicleRepository->getList();
    }

    public function getVehicleById($id)
    {
        return $this->vehicleRepository->getVehicleById($id);
    }
}