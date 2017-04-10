<?php

namespace App\Api\Repositories;

use App\Core\Models\ServiceProvider;
use App\Core\Models\Station;
use App\Core\Repositories\Repository;

class StationRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return Station::class;
    }

    public function getList()
    {
        return $this->model->all();
    }

    public function getStationById($id)
    {
        return $this->model->findOrFail($id);
    }
}