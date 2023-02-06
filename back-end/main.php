<?php
    header('Access-Control-Allow-Origin: http://localhost:5173');
    header('Access-Control-Allow-Credentials: true');

    $dsn = 'mysql:dbname=WEB1_CONTATOS;host=127.0.0.1;port=3306';
    $conn = new PDO($dsn, 'root', 'root');

    session_start();
?>