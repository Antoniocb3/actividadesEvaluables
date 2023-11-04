<?php
$verbos = array(
    array("ser/estar", "be", "was", "been"),
    array("empezar", "begin", "began", "begun"),
    array("doblar", "bend", "bent", "bent"),
    array("morder", "bite", "bit", "bitten"),
    array("construir", "build", "built", "built")
);

if (isset($_POST["texto"])) {
    $n_verbos = (int) $_POST["texto"];
    define('TAMANOFILAS', $n_verbos);
}


define('TAMANOCOLUMNAS', count($verbos[0]));