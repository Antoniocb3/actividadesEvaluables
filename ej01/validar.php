<?php
include('config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antonio Carmona Bascón</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <table>
        <?php
        // Tabla que muestra todas las respuestas
        $countAciertos = 0;
        $countErrores = 0;

        foreach ($_POST['tiempo'] as $i => $valores) { //$valores contiene el input y las respuestas
            echo "<tr>";
            foreach ($verbos[$i] as $clave => $valor) {
                // $respuesta = isset($valores[$clave]) ? $valores[$clave] : "<td class=\"tabla\">" . $verbos[$i][$clave] . "</td>";
                // $valores[$clave] es la respuesta del input
                if (isset($valores[$clave])) {
                    $respuesta = $valores[$clave];
                    if ($valor == $respuesta) {
                        echo "<td class=\"acierto\">" . $respuesta . "</td>";
                        $countAciertos++;
                    } else {
                        echo "<td class=\"error\">" . $respuesta . "</td>";
                        $countErrores++;
                    }
                } else {
                    echo "<td class=\"tabla\">" . $verbos[$i][$clave] . "</td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    echo "Has tenido " . $countAciertos . " aciertos y " . $countErrores . " errores";
    echo "<br/>";
    echo "Tu porcentaje de acierto es del " . round(($countAciertos * 100) / ($countAciertos + $countErrores), 2) . " %";

    ?>
    <br>
    <button type="submit"><a href="solucion.php?pasarinput=<?= $n_verbos ?>">Solución</a></button>
    <!-- La interrogación es para pasarle valores </?/= se utiliza para abrir el php
             es el equivalente a </?/php, pero al usarlo en una URL se hace de esa manera  -->
</body>

</html>