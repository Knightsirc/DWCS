<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
</head>
<body>
    <h1>Videojuegos registrados</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Plataforma</th>
            <th>Año</th>
            <th>Género</th>
            <th>Acciones</th>
        </tr>
        <!-- Datos de ejemplo. Tiene que ser dinámico -->
        <tr>
            <td>God of War</td>
            <td>PlayStation 4</td>
            <td>2018</td>
            <td>Acción</td>
            <td><a href="editar.php?id=2" style="border: 2px solid darkblue; text-decoration: none; padding: 5px 10px; display: inline-block; color: black;">Editar</a></td>
            <td><a href="eliminar.php?id=2" style="border: 2px solid darkblue; text-decoration: none; padding: 5px 10px; display: inline-block; color: black;">Eliminar</a></td>
        </tr>
        <tr>
            <td>Minecraft</td>
            <td>PC</td>
            <td>2011</td>
            <td>Sandbox</td>
            <td><a href="editar.php?id=3" style="border: 2px solid darkblue; text-decoration: none; padding: 5px 10px; display: inline-block; color: black;">Editar</a></td>
            <td><a href="eliminar.php?id=3" style="border: 2px solid darkblue; text-decoration: none; padding: 5px 10px; display: inline-block; color: black;">Eliminar</a></td>
        </tr>
        <tr>
    </table>
    <h2>Quieres añadir un nuevo videojuego</h2>
    <a href="añadir.php" style="border: 2px solid darkblue; text-decoration: none; padding: 5px 10px; display: inline-block; color: black;">Añadir</a>
</body>