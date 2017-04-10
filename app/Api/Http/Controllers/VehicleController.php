<?php

namespace App\Api\Http\Controllers;

use App\Api\Services\VehicleService;
use App\Api\Transformers\VehicleTransformer;

class VehicleController extends Controller
{
    /**
     * @var VehicleService
     */
    private $vehicleService;
    /**
     * @var VehicleTransformer
     */
    private $vehicleTransformer;

    function __construct(
        VehicleService $vehicleService,
        VehicleTransformer $vehicleTransformer
    )
    {
        $this->vehicleService = $vehicleService;
        $this->vehicleTransformer = $vehicleTransformer;
    }

    public function index()
    {
        $listVehicle = $this->vehicleService->getList();
        $listVehicle = $this->vehicleTransformer->transformCollection($listVehicle);

        return $this->responseOk($listVehicle);
    }

    public function show($id)
    {
        $vehicle = $this->vehicleService->getVehicleById($id);
        $vehicle = $this->vehicleTransformer->transform($vehicle);

        return $this->responseOk($vehicle);
    }
}