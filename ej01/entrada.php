<?php

/**
 * 
 * @author Antonio Carmona
 */

include('config/config.php');


//Función para crear números aleatorios
function numerosAleatorios($verbos)
{
    $arrayNumerosRandom = [];
    if (isset($_POST["submit"])) { // por si pone index.php directamente
        if ($_POST["dificultad"] == "facil") {
            for ($i = 0; $i < TAMANOFILAS; $i++) {
                $arrayNumerosRandom[$i] = array_rand($verbos[$i], 1); // en php puedes añadir los valores por posición, sin que la posición este previamente creada
            }
        } else if ($_POST["dificultad"] == "medio") {
            for ($i = 0; $i < TAMANOFILAS; $i++) {
                $arrayNumerosRandom[$i] = array_rand($verbos[$i], 2); // en php puedes añadir los valores por posición, sin que la posición este previamente creada

            }
        } else if ($_POST["dificultad"] == "dificil") {
            for ($i = 0; $i < TAMANOFILAS; $i++) {
                $arrayNumerosRandom[$i] = array_rand($verbos[$i], 3); // en php puedes añadir los valores por posición, sin que la posición este previamente creada
            }
        }
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
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <form action="validar.php" method="post">
        <table>
            <input name="texto" type="hidden" value="<?= $n_verbos ?>"/>
            <!--Pongo este input oculto para que al pasar el valor, que en este caso es
                el número de verbos y guardarlo en $_POST para reutilizar config
                en validar.php -->
            <?php
            $arrayAleatorio = numerosAleatorios($verbos);
            // var_dump($arrayAleatorio);
            for ($i = 0; $i < TAMANOFILAS; $i++) {
                echo "<tr>";
                foreach ($verbos[$i] as $clave => $valor) {
                    $comprobar = false; // lo uso para comprobar si le mete el input o no
                    if ($_POST["dificultad"] == "facil") {
                        if ($arrayAleatorio[$i] == $clave) { // $clave seria = 'espanol'
                            echo "<td><input class=\"input\" name='tiempo[$i][$arrayAleatorio[$i]]'></td> "; // se pone arrayaleatorio[i] para que solo guarde los tiempos del input
                        } else {
                            echo "<td class=\"cabecera\">" . $verbos[$i][$clave] . "</td>"; // la clase cabecera puedo no ponerla, pero si en algun momento quiero darle CSS, ya tengo la clase creada
                        }
                    } else if ($_POST["dificultad"] == "medio") {
                        for ($j = 0; $j < 2; $j++) { // 2 porque en medio son 2 inputs
                            if ($arrayAleatorio[$i][$j] == $clave) { // $arrayAleatorio[$i][$j] == $j
                                $comprobar = true;
                                echo "<td><input class=\"input\" name='tiempo[$i][" . $arrayAleatorio[$i][$j] . "]'></td> ";
                            }
                        }
                        if (!$comprobar) { // no se puede hacer con else porque lo pinta doble
                            echo "<td class=\"cabecera\">" . $verbos[$i][$clave] . "</td>"; // la clase cabecera puedo no ponerla, pero si en algun momento quiero darle CSS, ya tengo la clase creada
                        }
                    } else if ($_POST["dificultad"] == "dificil") {
                        for ($j = 0; $j < 3; $j++) {
                            if ($arrayAleatorio[$i][$j] == $clave) { // $arrayAleatorio[$i][$j] == $j
                                $comprobar = true;
                                echo "<td><input class=\"input\" name='tiempo[$i][" . $arrayAleatorio[$i][$j] . "]'></td> ";
                            }
                        }
                        if (!$comprobar) {
                            echo "<td class=\"cabecera\">" . $verbos[$i][$clave] . "</td>"; // la clase cabecera puedo no ponerla, pero si en algun momento quiero darle CSS, ya tengo la clase creada
                        }
                    }
                }
                echo "</tr>";
            }
            ?>
        </table>
        <button type="submit">Validar</button>
        
    </form>
</body>

</html>