<?php

require_once "bd.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nic = $_POST['nic'] ?? '';
    $email = $_POST['email'] ?? '';
    $pass1 = $_POST['pass1'] ?? '';
    $pass2 = $_POST['pass2'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellido1 = $_POST['apellido1'] ?? '';
    $apellido2 = $_POST['apellido2'] ?? '';

    $error = [];
    if (empty($nic)){
        $error[] = "El campo nic es obligatorio!";
    }if (empty($email)){
        $error[] = "El campo email es obligatorio!";
    }if (empty($pass1)){
        $error[] = "El campo pass1 es obligatorio!";
    }if (empty($pass2)){
        $error[] = "El campo pass2 es obligatorio!";
    }if (empty($nombre)){
        $error[] = "El campo nombre es obligatorio!";
    }if (empty($apellido1)){
        $error[] = "El campo apellido1 es obligatorio!";
    }
    $apellido2 = empty($apellido2) ? null : $apellido2;

    if(count($error)== 0){
        $pass1 = sha1($pass1);
        
        addUser( $nic,  $email,$pass1, $nombre,   $apellido1, $apellido2);
    }
}
