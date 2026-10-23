<?php

declare(strict_types=1);

namespace App\Contract;

use App\Model\Ticket;

/* 
Contrato que define que necesita mi aplicacion de cualquier catalogo de tickets 
 La interface describe que operaciones deben existir pero no como se llevan a cabo*/

interface TicketCatalogInterface
{
    /* Método que devuelva un array con el listado de todos los tickets */
    public function getTickets(): array;

    /* Metodo find que encuentra un ticket en el listado dado su id y que devuelva null si no
    existe
    */
    public function find(string $id): ?Ticket;
}