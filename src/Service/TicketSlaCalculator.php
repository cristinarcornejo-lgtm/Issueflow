<?php

namespace App\Service;

use App\Model\ticket;
use App\Model\TicketPriority;

final class TicketSlaCalculator
{
    public function getResponseTargetHours(Ticket $ticket): int
    {
        return match ($ticket->getPriority()) {
            TicketPriority::Urgent => 4,
            TicketPriority::High => 8,
            TicketPriority::Normal => 24,
            TicketPriority::Low => 72
        };
    }
}