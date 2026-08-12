<?php

require_once '../config/config.php';

$stmt = $pdo->query("SELECT * FROM participantes");

$participantes = $stmt->fetchAll();

foreach($participantes as $participante){
    echo $participante['nome'] . "<br>";
}

?>