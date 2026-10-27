<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="login.php" method="POST">
        <label>NIC de usuario:</label><br>
        <input type="text" name="nic" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit" name="login">Entrar</button>
    </form>

    <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>

    <?php
    if (isset($_POST['login'])) {
        require_once 'conexion.php';
        $conexion = getConexion();

        $nic = $_POST['nic'];
        $password = $_POST['password'];

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nic = :nic");
        $stmt->execute([':nic' => $nic]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            echo "<p style='color: green;'>¡Bienvenido, " . htmlspecialchars($usuario['nombre']) . "!</p>";
            // Aquí podrías iniciar sesión con sesiones (session_start)
        } else {
            echo "<p style='color: red;'>NIC o contraseña incorrectos.</p>";
        }
    }
    ?>
</body>
</html>