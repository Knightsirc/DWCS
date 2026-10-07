<?php

require_once 'direccion.php';

class Persona {
    private string $nombre;
    private int $edad;
    private Direccion $direccion;
   
    public function __construct(string $nombre, int $edad, Direccion $direccion) {
        $this->nombre = $nombre;
        $this->setEdad($edad);
        $this->direccion = $direccion;
    }

    public function getNombre(): string {
        return $this->nombre;
    }
    
    public function getEdad(): int {
        return $this->edad;
    }

    public function getDireccion(): Direccion {
        return $this->direccion;
    }

    public function setNombre(string $nombre): Persona {
        $this->nombre = $nombre;
        return $this;
    }

    public function setEdad(int $edad): Persona {
        if ($edad <= 0) {
            throw new InvalidArgumentException("Edad inválida");
        }
        $this->edad = $edad;
        return $this;
    }

    public function setDireccion(Direccion $direccion): Persona {
        $this->direccion = $direccion;
        return $this;
    }

    public function esMayorDeEdad(): bool {
        return $this->edad >= 18;
    }

    public function mostrarDireccionCompleta(): void {
        echo "Dirección de {$this->nombre}: " . $this->direccion->__toString();
    }
}