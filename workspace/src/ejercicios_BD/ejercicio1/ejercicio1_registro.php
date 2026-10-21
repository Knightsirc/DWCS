<?php

function getConexion()
{
    $dsn = "mysql:host=db;dbname=mi_base_de_datos;charset=utf8mb4";
    try {
        $conexion = new PDO($dsn, "usuarioBD", "abc123");
        // Configuramos PDO para que lance excepciones en caso de error
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error en la conexion con la BD: " . $e->getMessage();
        die();
    }

    return $conexion;
}

/**
 * Agrega un usuario a la base de datos de forma segura.
 */
function registrarUsuario($nombre, $apellido1, $apellido2, $nic, $correo, $passwordPlain)
{
    $conexion = getConexion();

    // 1. Hashear la contraseña (el hash resultante suele ocupar 60 caracteres para PASSWORD_DEFAULT, 
    // pero guardarlo en un VARCHAR(256) cumple perfectamente con lo pedido).
    $passwordHash = password_hash($passwordPlain, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuarios (nombre, apellido1, apellido2, nic, correo, password) 
                VALUES (:nombre, :apellido1, :apellido2, :nic, :correo, :password)";
        
        $stmt = $conexion->prepare($sql);
        
        $stmt->execute([
            ':nombre' => $nombre,
            ':apellido1' => $apellido1,
            ':apellido2' => $apellido2,
            ':nic' => $nic,
            ':correo' => $correo,
            ':password' => $passwordHash
        ]);

        return "¡Usuario registrado con éxito!";
        
    } catch (PDOException $e) {
        // Si hay error por duplicidad (NIC o correo repetidos)
        if ($e->getCode() == 23000) {
            return "Error: El NIC o el correo electrónico ya están registrados.";
        }
        return "Error al registrar el usuario: " . $e->getMessage();
    }
}