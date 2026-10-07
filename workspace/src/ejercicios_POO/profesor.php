<?php
class Profesor extends Persona{
  private string $especialidad;

  #[Override]
  public function __construct(string $nombre, int $edad, string $especialidad)
  {
    $this->especialidad = $especialidad;
    parent::__construct($nombre, $edad);
  }

  
  public function getEspecialidad()
  {
    return $this->especialidad;
  }

  public function setEspecialidad(string $especialidad): Profesor
  {
    $this->especialidad = $especialidad;

    return $this;
  }

  

}