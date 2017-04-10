<?php

namespace App\Api\Repositories;

use App\Core\Models\ServiceProvider;
use App\Core\Repositories\Repository;

class ServiceProviderRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return ServiceProvider::class;
    }

    public function getList()
    {
        return $this->model->all();
    }

    public function getServiceProviderById($id)
    {
        return $this->model->findOrFail($id);
    }
}