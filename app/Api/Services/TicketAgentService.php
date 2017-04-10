<?php

namespace App\Api\Services;

use App\Api\Repositories\TicketAgentRepository;

class TicketAgentService extends Service
{
    /**
     * @var TicketAgentRepository
     */
    private $ticketAgentRepository;

    function __construct(TicketAgentRepository $ticketAgentRepository)
    {
        $this->ticketAgentRepository = $ticketAgentRepository;
    }

    public function getList()
    {
        return $this->ticketAgentRepository->getList();
    }

    public function getTicketAgentById($id)
    {
        return $this->ticketAgentRepository->getTicketAgentById();
    }
}