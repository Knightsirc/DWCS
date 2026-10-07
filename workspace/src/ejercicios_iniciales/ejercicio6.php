<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <label for="num">Introduce los números deseados (separados por comas):</label>
        <input type="text" name="numbers" placeholder="Ej: 5,-3,0,12">
        <input type="submit" value="enviar">
    </form>

    <?php
    if (isset($_POST['numbers']) && $_POST['numbers'] !== '') {
        
        // 1. Recogemos el texto con todos los números
        $texto_numeros = $_POST['numbers'];

        // 2. Con "explode" rompemos el texto cada vez que haya una coma
        // Esto crea un array (una lista) con cada número por separado
        $lista_numeros = explode(',', $texto_numeros);

        echo "<h3>Resultados:</h3>";
        echo "<ul>";

        // 3. Recorremos la lista número a número con un bucle foreach
        foreach ($lista_numeros as $num) {
            
            // "trim" limpia espacios en blanco invisibles por si pusiste "5, -3"
            $num = trim($num);

            // Validamos que realmente sea un valor numérico para evitar errores
            if (is_numeric($num)) {
                if ($num < 0) {
                    echo "<li>El número <b>$num</b> es negativo</li>";
                } elseif ($num == 0) {
                    echo "<li>El número <b>$num</b> es 0</li>";
                } else {
                    echo "<li>El número <b>$num</b> es positivo</li>";
                }
            } else {
                echo "<li>'<b>$num</b>' no es un número válido</li>";
            }
        }

        echo "</ul>";
    }
    ?>
</body>
</html>