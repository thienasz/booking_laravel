<?php

namespace App\Api\Services;

use App\Api\Repositories\StationRepository;

class StationService extends Service
{
    /**
     * @var StationRepository
     */
    private $stationRepository;

    function __construct(StationRepository $stationRepository)
    {
        $this->stationRepository = $stationRepository;
    }

    public function getList()
    {
        return $this->stationRepository->getList();
    }

    public function getStationById($id)
    {
        return $this->stationRepository->getStationById($id);
    }
}