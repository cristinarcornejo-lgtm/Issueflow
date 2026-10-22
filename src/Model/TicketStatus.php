<?php

declare(strict_types=1);

namespace App\Model;

/* Implementacion de las prioridades permitidas por el sistema IssuewFlow
El sisitema permita sólo cuatro prioridades: 'urgent', 'high', 'normal' y 'low' */

enum TicketStatus: string
{
    case Open = 'open';
    case InProgress = 'in_progress';
    case Closed = 'closed';

    /* Un Enum tambien puede tener métodos.
    Implementamos el método getLabel() para
    asignar especificamente el texto que se quiere mostrar */
    public function getLabel(): string 
    {
        return match ($this) {
            self::Open => 'Abierto',
            self::InProgress => 'En Progreso',
            self::Closed =>'Cerrado',
        };
    }
    /* Método que devuelve true si una incidencia esta cerrada */
     public function isClosed(): bool
    {
        return $this === self::Closed;
    }
}