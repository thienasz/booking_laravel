<?php

namespace App\Api\Http\Controllers;

use App\Api\Services\TicketAgentService;
use App\Api\Transformers\TicketAgentTransformer;

class TicketAgentController extends Controller
{
    /**
     * @var TicketAgentService
     */
    private $ticketAgentService;
    /**
     * @var TicketAgentTransformer
     */
    private $ticketAgentTransformer;

    function __construct(
        TicketAgentService $ticketAgentService,
        TicketAgentTransformer $ticketAgentTransformer
    )
    {
        $this->ticketAgentService = $ticketAgentService;
        $this->ticketAgentTransformer = $ticketAgentTransformer;
    }

    public function index()
    {
        $listTicketAgent = $this->ticketAgentService->getList();
        $listTicketAgent = $this->ticketAgentTransformer->transformCollection($listTicketAgent);

        return $this->responseOk($listTicketAgent);
    }

    public function show($id)
    {
        $vehicle = $this->ticketAgentService->getTicketAgentById($id);
        $vehicle = $this->ticketAgentTransformer->transform($vehicle);

        return $this->responseOk($vehicle);
    }
}