<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro</h2>
    <form action="registro.php" method="POST">
        <label>Nombre (máx 60):</label><br>
        <input type="text" name="nombre" maxlength="60" required><br><br>

        <label>Apellido 1 (máx 100):</label><br>
        <input type="text" name="apellido1" maxlength="100" required><br><br>

        <label>Apellido 2 (máx 100):</label><br>
        <input type="text" name="apellido2" maxlength="100"><br><br>

        <label>NIC de usuario (máx 30):</label><br>
        <input type="text" name="nic" maxlength="30" required><br><br>

        <label>Correo electrónico (máx 320):</label><br>
        <input type="email" name="correo" maxlength="320" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit" name="registrar">Registrarse</button>
    </form>


    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>

    <?php
    if (isset($_POST['registrar'])) {
        require_once 'ejercicio1_registro.php'; 
        
        $mensaje = registrarUsuario(
            $_POST['nombre'],
            $_POST['apellido1'],
            $_POST['apellido2'],
            $_POST['nic'],
            $_POST['correo'],
            $_POST['password']
        );
        
        echo "<p><strong>$mensaje</strong></p>";
    }
    ?>
</body>
</html>