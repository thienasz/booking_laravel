<?php

namespace App\Api\Repositories;

use App\Core\Models\ServiceProvider;
use App\Core\Models\Station;
use App\Core\Models\TicketAgent;
use App\Core\Repositories\Repository;

class TicketAgentRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    protected function model()
    {
        return TicketAgent::class;
    }

    public function getList()
    {
        return $this->model->all();
    }

    public function getTicketAgentById($id)
    {
        return $this->model->findOrFail($id);
    }
}