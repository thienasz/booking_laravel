<?php

namespace App\Api\Http\Controllers;

use App\Api\Services\ServiceProviderService;
use App\Api\Transformers\ServiceProviderTransformer;

class ServiceProviderController extends Controller
{
    /**
     * @var ServiceProviderService
     */
    private $serviceProviderService;
    /**
     * @var ServiceProviderTransformer
     */
    private $serviceProviderTransformer;

    function __construct(
        ServiceProviderService $serviceProviderService,
        ServiceProviderTransformer $serviceProviderTransformer
    )
    {
        $this->serviceProviderService = $serviceProviderService;
        $this->serviceProviderTransformer = $serviceProviderTransformer;
    }

    public function index()
    {
        $listProvider = $this->serviceProviderService->getList();
        $listProvider = $this->serviceProviderTransformer->transformCollection($listProvider);

        return $this->responseOk($listProvider);
    }

    public function show($id)
    {
        $provider = $this->serviceProviderService->getServiceProviderById($id);
        $provider = $this->serviceProviderTransformer->transform($provider);

        return $this->responseOk($provider);
    }
}