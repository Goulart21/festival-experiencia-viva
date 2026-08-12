<?php

$host = 'localhost';
$dbname = 'festival_experiencia_viva';
$username = 'root';
$password = 'senac@2026';

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

    echo"cdasd";

} catch (PDOException $e) {

    die("Erro ao conectar ao banco de dados.");

}