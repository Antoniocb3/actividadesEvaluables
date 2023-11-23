<?php
/**
 * 
 * @author Antonio Carmona Bascón
 */

include('config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antonio Carmona Bascón</title>
</head>

<body>
    <table>
        <?php
        // Tabla que muestra todas las respuestas
        for ($i = 0; $i < TAMANOFILAS; $i++) {
            echo "<tr>";
            foreach ($verbos[$i] as $clave => $valor) {
                echo "<td class=\"cabecera\">" . $verbos[$i][$clave] . "</td>"; // la clase cabecera puedo no ponerla, pero si en algun momento quiero darle CSS, ya tengo la clase creada
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>