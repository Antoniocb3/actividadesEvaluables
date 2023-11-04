<?php 
/**
 * 
 * 
 * 
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
    <form action="index.php" method="post">
        <p>Selecciona el número de verbos: <input type="text" name="texto" required ></p>
        <p>Selecciona el nivel: <select name="dificultad">
            <option value="facil">Fácil</option>
            <option value="medio">Medio</option>
            <option value="dificil">Difícil</option>
        </select></p>
        <button type="submit">A jugar!</button>
    </form>
    
</body>
</html>