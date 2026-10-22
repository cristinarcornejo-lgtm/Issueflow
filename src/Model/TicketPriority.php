<?php

declare(strict_types=1);

namespace App\Model;

/* Implementacion de las prioridades permitidas por el sistema IssuewFlow
El sisitema permita sólo cuatro prioridades: 'urgent', 'high', 'normal' y 'low' */

enum TicketPriority: string
{
    case Urgent = 'urgent';
    case High = 'high';
    case Normal = 'normal';
    case Low = 'low';

    /* Un enum tambien puede tener métodos.
    Implementamos el método getLabel () para asignar especificamente
    el texto que se quiere mostrar al usuario */
  public function getLabel(): string 
    {
        return match ($this) {
            self::Urgent => 'Urgente',
            self::High => 'Alta',
            self::Normal =>'Normal',
            self::Low =>'Baja',
        };
    }

    /* Crear un metodo que verifica si la prioridad es urgente 
    Se implementa aqui porque esta es la clase responsable de prioridades
    de Ticket*/
    public function isUrgent(): bool
    {
        return $this === self::Urgent;
    }
}