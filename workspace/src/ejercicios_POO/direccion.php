<?php
class Direccion {
    private string $calle;
    private string $ciudad;
    private string $codigoPostal;

    public function __construct(string $calle, string $ciudad, string $codigoPostal) {
        $this->calle = $calle;
        $this->ciudad = $ciudad;
        $this->codigoPostal = $codigoPostal;
    }

    public function getCalle(): string {
        return $this->calle;
    }

    public function getCiudad(): string {
        return $this->ciudad;
    }

    public function getCodigoPostal(): string {
        return $this->codigoPostal;
    }

    // Método para obtener la dirección completa en formato de texto
    public function __toString(): string {
        return "{$this->calle}, {$this->ciudad} (C.P. {$this->codigoPostal})";
    }
}