<?php

namespace App\Api\Transformers;

class TicketAgentTransformer extends Transformer
{
    public function transform($ticketAgent)
    {
        return $ticketAgent->toArray();
    }
}