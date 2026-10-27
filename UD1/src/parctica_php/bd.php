<?php

//1

define("DSN","mysql:host=db;dbname=ejercicio3_1");

define("DB_USER", "root");

define("DB_PASS", "root");

// 2

function getConnection(){

    try {

        return $db = new PDO(DSN, DB_USER,DB_PASS);

    } catch (PDOException $e) {

        error_log("No se ha podido acceder a la base de datos: " . $e->getMessage());

        die();

    }

}



$conexionPrueba = getConnection();

// if($conexionPrueba){

//     echo "Conectado";

// };



//3

function getUserByNic(string $nic): array | false {

    $usuario = false;

    $sql= "SELECT id, nic, email, nombre, apellido1, apellido2, contrasena FROM usuarios WHERE nic='$nic'";

    $db=getConnection();



    try {

    $statement=$db->query($sql);

    $usuario = $statement->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        error_log("Error en la consulta $sql " . $e->getMessage());

    } finally{

    $db=null;

    $statement=null;

    }

    return $usuario;

}


//var_dump(getUserByNic("campero"));

function  addUser(string $nic, string $email, string $nombre, string  $apellido1, ? string $apellido2, string $contrasena):bool{

    $usuarioAgregado = false;

    if (isset($apellido2)){

        $sql  = "INSERT INTO usuarios(nic, email, nombre, apellido1, apellido2, contrasena) VALUES ('$nic','$email','$nombre','$apellido1','$apellido2','$contrasena')";
    }else {
        $sql  = "INSERT INTO usuarios(nic, email, nombre, apellido1, contrasena) VALUES ('$nic','$email','$nombre','$apellido1','$contrasena')";
    }

    try {
       
        $db  = getConnection();

        $usuarioAgregado = $db->exec($sql) === 1;

    } catch (PDOException  $e) {
        error_log("Error al insertar el usuario $sql" . $e->getMessage());
    } finally {
        $db = null;
    }

    return  $usuarioAgregado;
}

//var_dump(addUser("C", "knight@gmail.com", "Cristian", "Otero","Castro", "abc123"));
//var_dump(getUserByNic("C"));
