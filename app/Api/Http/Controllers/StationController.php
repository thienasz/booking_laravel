<?php

namespace App\Api\Http\Controllers;

use App\Api\Services\StationService;
use App\Api\Transformers\StationTransformer;

class StationController extends Controller
{
    /**
     * @var StationService
     */
    private $stationService;
    /**
     * @var StationTransformer
     */
    private $stationTransformer;

    function __construct(
        StationService $stationService,
        StationTransformer $stationTransformer
    )
    {
        $this->stationService = $stationService;
        $this->stationTransformer = $stationTransformer;
    }

    public function index()
    {
        $listStation = $this->stationService->getList();
        $listStation = $this->stationTransformer->transformCollection($listStation);

        return $this->responseOk($listStation);
    }

    public function show($id)
    {
        $station = $this->stationService->getStationById($id);
        $station = $this->stationTransformer->transform($station);

        return $this->responseOk($station);
    }
}