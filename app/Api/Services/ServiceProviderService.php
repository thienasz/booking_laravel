<?php

namespace App\Api\Services;

use App\Api\Repositories\ServiceProviderRepository;

class ServiceProviderService extends Service
{

    /**
     * @var ServiceProviderRepository
     */
    private $serviceProviderRepository;

    function __construct(ServiceProviderRepository $serviceProviderRepository)
    {
        $this->serviceProviderRepository = $serviceProviderRepository;
    }

    public function getList()
    {
        return $this->serviceProviderRepository->getList();
    }

    public function getServiceProviderById($id)
    {
        return $this->serviceProviderRepository->getServiceProviderById($id);
    }
}