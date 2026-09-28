 <h2>Comprobador de Anagramas en PHP</h2>
    
    <form method="post" action="">
        <div>
            <label for="palabra1">Primera palabra:</label><br>
            <input type="text" id="palabra1" name="palabra1" required>
        </div>
        <br>
        <div>
            <label for="palabra2">Segunda palabra:</label><br>
            <input type="text" id="palabra2" name="palabra2" required>
        </div>
        <br>
        <button type="submit">Comprobar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoger y limpiar los datos del formulario
        $palabra1 = trim($_POST['palabra1']);
        $palabra2 = trim($_POST['palabra2']);

        function sonAnagramas($str1, $str2) {
            // Convertir a minúsculas para ignorar mayúsculas/minúsculas
            $str1 = mb_strtolower($str1, 'UTF-8');
            $str2 = mb_strtolower($str2, 'UTF-8');

            // Si tienen distinta longitud, no pueden ser anagramas
            if (mb_strlen($str1, 'UTF-8') !== mb_strlen($str2, 'UTF-8')) {
                return false;
            }

            // Convertir las palabras en un array de caracteres
            $arr1 = mb_str_split($str1);
            $arr2 = mb_str_split($str2);

            // Ordenar los caracteres alfabéticamente
            sort($arr1);
            sort($arr2);

            // Comparar si ambos arrays son idénticos
            return $arr1 === $arr2;
        }

        // Mostrar el resultado en pantalla
        if (sonAnagramas($palabra1, $palabra2)) {
            echo "<div class='resultado exito'>¡Sí! \"$palabra1\" y \"$palabra2\" son anagramas.</div>";
        } else {
            echo "<div class='resultado error'>No, \"$palabra1\" y \"$palabra2\" no son anagramas.</div>";
        }
    }
    ?>


