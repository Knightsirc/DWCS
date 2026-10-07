<?php
class Persona {
    private string $nombre;
    private int $edad;

    public function __construct(string $nombre, int $edad){
        $this-> nombre = $nombre;
        $this-> edad = $edad;
    }

    public function getNombre(): string{
        return $this->nombre;
    }
    
    public function getEdad(): int{
        return $this->edad;
    }

    public function setNombre(int $nombre): Persona{
        $this-> nombre = $nombre;
        return $this;
    }

    public function setEdad(int $edad): Persona{
        if ($edad <= 0) {
            throw new InvalidArgumentException("Edad inválida");
        }
        $this-> edad = $edad;
        return $this;
    }

    public function esMayorDeEdad(): bool{
        return $this -> edad >= 18;
    }
}