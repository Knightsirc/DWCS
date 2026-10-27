<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>
    <form action="" method="post">
        <label for="num">Introduzca 5 números:</label>
        <input type="text" name="numbers" placeholder="Ej: 1,2,3,4,5">
        <input type="submit" value="enviar">
    </form>

<?php
    // Es una buena práctica definir la función fuera del bloque if
    function calcularNumeros($lista) {
       $maximo = max($lista);
       $minimo = min($lista);
       $sumaValores = array_sum($lista);
       $cantidadValores = count($lista);
       $media = $cantidadValores > 0 ? $sumaValores / $cantidadValores : 0;
       
       return [
        "mayor" => $maximo,
        "menor" => $minimo,
        "media" => $media
       ];
    }

    if (isset($_POST['numbers']) && $_POST['numbers'] !== '') {
        $texto_numeros = $_POST['numbers'];
        
        // Rompemos el texto en un array usando la coma
        $lista_bruta = explode(',', $texto_numeros);
        $lista_numeros = [];

        // Limpiamos espacios y convertimos cada elemento a número
        foreach ($lista_bruta as $num) {
            $lista_numeros[] = floatval(trim($num));
        }

        // Llamamos a la función pasándole el array limpio y guardamos el resultado
        $resultado = calcularNumeros($lista_numeros);

        // Mostramos el resultado en pantalla
        echo "<h3>El resultado es el siguiente:</h3>";
        echo "<ul>";
        echo "<li>Número mayor: " . $resultado['mayor'] . "</li>";
        echo "<li>Número menor: " . $resultado['menor'] . "</li>";
        echo "<li>Media: " . $resultado['media'] . "</li>";
        echo "</ul>";
    }
?>
</body>
</html>