<?php

/**
 * 
 * @author Antonio Carmona
 */

include('config/config.php');


$verbos = array(
    array("ser/estar", "be", "was", "been"),
    array("empezar", "begin", "began", "begun"),
    array("doblar", "bend", "bent", "bent"),
    array("morder", "bite", "bit", "bitten"),
    array("construir", "build", "built", "built")
);

//Función para crear números aleatorios
function numerosAleatorios()
{
    $arrayNumerosRandom = [];
    for ($i = 0; $i < TAMANOFILAS; $i++) {
        $arrayNumerosRandom[$i] = random_int(0, TAMANOCOLUMNAS - 1); // en php puedes añadir los valores por posición, sin que la posición este previamente creada
    }
    return $arrayNumerosRandom;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antonio Carmona Bascón</title>
</head>

<body>
    <form action="validar.php" method="post">
        <!-- <table>
            <?php
            // Tabla que muestra todas las respuestas
            for ($i = 0; $i < TAMANOFILAS; $i++) {
                echo "<tr>";
                for ($j = 0; $j < TAMANOCOLUMNAS; $j++) {
                    echo "<td class=\"cabecera\">" . $verbos[$i][$j] . "</td>"; // la clase cabecera puedo no ponerla, pero si en algun momento quiero darle CSS, ya tengo la clase creada
                }
                echo "</tr>";
            }
            ?>
        </table> -->

        <table>
            <?php
            $arrayAleatorio = numerosAleatorios();
            var_dump($arrayAleatorio);
            for ($i = 0; $i < TAMANOFILAS; $i++) {
                echo "<tr>";
                for ($j = 0; $j < TAMANOCOLUMNAS; $j++) {
                    if ($arrayAleatorio[$i] == $j) { // $arrayAleatorio[$i][$j] == $j
                        $arrayAleatorio[$i] = "";
                        echo "<td><input class=\"input\"></td>";
                    } else {
                        echo "<td class=\"cabecera\">" . $verbos[$i][$j] . "</td>"; // la clase cabecera puedo no ponerla, pero si en algun momento quiero darle CSS, ya tengo la clase creada
                    }
                }
                echo "</tr>";
            }
            ?>
        </table>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>