<?php

declare(strict_types=1);

class Car
{
    public function __construct(private string $brand)
    {}

    /* Un método que no es static, debe ser invocado siempre por 
    un objeto de la clase 
    No puedo usar $this dentro de un metodo static, esto es, 
    no puedo usar atributos ni metodos no static dentro de el*/ 
    public function gerBrand()
    {
        return $this->brand;
    }

    /*  Un método static puede ser invocado sin instanciar objetos de la clase */
    public static function saludo()
    {
        return "Hola, soy un método static";
    }
}
// Llamada a un método estático
echo Car::saludo();

// llamada a un método No Static
$car1 = new Car('Citroen');
echo $car1->getBrand() 
