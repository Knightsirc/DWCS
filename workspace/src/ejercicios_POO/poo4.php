<?php
require_once 'persona.php';
class Estdudiante extends Persona{
    private string $grado;

    #[Override]
    public function __construct(string $nombre, int $edad, string $grado)
    {
        $this->grado = $grado;
        parent::__construct($nombre, $edad);
    }

    public function getGrado(): string{
        return $this-> grado;
    }

    public function setGrado(string $grado){
        $this->grado = $grado;
        return $this;
    }

    public function mostrarInformacion() :void{
        echo "Nombre: " . $this->getNombre() . ", Edad: " . $this->getEdad() . ", Grado: " . $this->grado;
    }

}

