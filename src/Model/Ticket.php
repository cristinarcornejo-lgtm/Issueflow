<?php

/* Voy a poner aqui todo lo que sea del modelo momentaneamente y despues las movere
a otras partes específicas */

declare(strict_types=1);

namespace App\Model;

use InvalidArgumentException;

/* Ticket representa una incidencia en Issueflow como un objeto PHP
*/

final class Ticket
{
/* El modelo define que es la entidad diciendo cuales son las propiedades que contiene
    y necesitamos un constructor para crear nuevos tickets 
    en PHP basico lo hariamos así:
    
    private string $id;
    private string $title;
    private string $priority;
    private string $status;

    public function __construct(string $id, string $title, string $priority, string $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->priority = $priority;
        $this->status = $ status
    }
    
    /* Hay una manera abreviada de escribir todo esto */
     /* Constructor Property Promotion (PHP moderno, del 8.1 en adelante)
     */
    public function __construct(
        private string $id, 
        private string $title, 
        private TicketPriority $priority, 
        private TicketStatus $status
        )
    {
        /*  Validar el formato de id: INC- seguido de cuatro dígitos
            Para ello usamos una regex: regular expression (expresión regular): '/^INC-\d{4}$/'
            La función preg_match() compara una cadena de texto con la regex y devuelve 1
            si la cadena de texto es válida
        */
        if(preg_match('/^INC-\d{4}$/', $this->id) !== 1) {
            throw new InvalidArgumentException('El id no tiene un formato válido');
        }

        /* Normalización de title: Eliminar espacios en blanco antes y después 
        La función trim() elimina estos espacios
        */
        $normalizedTitle = trim($title);

        /* Verifico que $normalizedTitle no sea una cadena de texto vacía */
        if ($normalizedTitle === '') {
            throw new InvalidArgumentException('El título no puede estar vacío');
        }

        $this->title = $normalizedTitle;
    }
    

    /* Creamos los getters para cada uno de los atributos */
    public function getId(): string
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getPriority(): TicketPriority
    {
        return $this->priority;
    }
    public function getStatus(): TicketStatus
    {
        return $this->status;
    }

    /* Metodo que devuelve true si el ticket tiene una prioridad 'urgent' y false
    en caso contrario */
    public function isUrgent(): bool
    {
        return $this->priority->isUrgent();
    }
    public function isClosed(): bool
    {
        return $this->status->isClosed();
    }

}

?>
